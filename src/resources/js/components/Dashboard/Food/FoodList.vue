<template>
    <div class="mt-5 fs-14">
        <button class=" border-0 bg-blue text-white p-2 me-2" data-bs-toggle="modal" data-bs-target="#formModal">Buat Baru</button>
        <button class=" bg-success text-white border-0 p-2 " data-bs-toggle="modal" data-bs-target="#importModal">Import Excel</button>
    </div>

    <!-- list -->
    <div class="mt-5 fs-14">
        <div  v-if="isLoading" class="d-flex justify-content-center align-items-center p-5">
            <div class="spinner-border text-blue" role="status" style="width: 3rem; height: 3rem">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>


        <div v-if="isLoading===false" v-for="(food, index) in foods" :key="index">
            <!-- Food Item -->
            <div class="row mb-3">
                <!-- Food Image -->
                <div class="col-4 col-md-2">
                    <img :src="food.image" class="w-100">
                </div>
                <!-- Food Details -->
                <div class="col-7 col-md-9">
                    <h5>{{ food.name }}</h5>
                    <div class="fs-12">
                        <!-- Food Ingredients -->
                        <span v-for="(item, index) in food.food_ingredients" class="me-2" :key="index">
                            {{ item.amount }} {{ item.unit }}  {{ item.ingredient.name }},
                        </span>
                    </div>
                </div>
                <!-- Button to Open Modal -->
                <div class="col-md-1">
                    <button class="bg-none rounded-circle p-2 text-black fw-bold fs-14 border shadow" 
                            :data-bs-target="'#stepModal' + index" data-bs-toggle="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-info" viewBox="0 0 16 16">
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal for Food Item -->
            <div class="modal fade" :id="'stepModal' + index" tabindex="-1" :aria-labelledby="'stepModalLabel' + index" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-blue text-white">
                            <h1 class="modal-title fs-14" :id="'stepModalLabel' + index">Langkah Pembuatan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul >
                                <li v-for="(step, index) in food.cooking_step" :key="index" class="fs-12 mb-3">{{step.step}}</li>
                            </ul>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fs-14" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- modal import -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-blue text-white">
                    <h1 class="modal-title fs-14" id="importModalLabel">Import Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <input type="file" @change="handleExcel" multiple>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-14" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success fs-14" @click="importExcel" :disabled="loadingImport">Import</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal new Food -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-blue text-white">
                    <h1 class="modal-title fs-14" id="formModalLabel">Form Makanan</h1>
                </div>
                <div class="modal-body fs-12">
                    <form @submit.prevent="submitForm">
                        <!-- name -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 d-flex flex-column">
                                    <label for="name" class="text-blue mb-2">Nama Makanan</label>
                                    <input type="text" id="name" placeholder="ex : Bubur Ayam" v-model="field.name"
                                        required>
                                </div>
                                <!-- image -->
                                <div class="mb-4 d-flex flex-column">
                                    <label for="image" class="text-blue mb-2">Url Gambar</label>
                                    <input type="file" accept="image/*" @change="handleImage">
                                </div>

                                <!-- step -->
                                <div class="mb-4 d-flex flex-column">
                                    <label for="steps" class="text-blue mb-2">Langkah Pembuatan</label>
                                    <div class="p-3 border rounded">
                                        <div v-for="(step, index) in field.step" :key="index" class="mb-2 d-flex">
                                            <input type="text" class="border w-100 p-2" v-model="step.text">
                                            <button type="button" class="btn btn-danger fs-12 ms-2"
                                                @click="removeStep(index)"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="12" height="12" fill="currentColor" class="bi bi-trash3-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg></button>
                                        </div>
                                        <button type="button"
                                            class="bg-blue w-100 fs-12 p-1 mt-3 border-0 rounded text-white"
                                            @click="addNewStep">Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 d-flex flex-column">
                                    <div class="d-flex mb-2 justify-content-between">
                                        <label for="name" class="text-blue mb-2">Bahan-bahan</label>
                                        <button type="button" class="border-0 bg-blue text-white rounded fs-12" @click="toggleNewIngredient">{{isNewIngredient ? 'Batal': 'Buat Bahan Baru'}}</button>
                                    </div>
                                    <div class="border p-3 mb-3 rounded" v-if="isNewIngredient">
                                        <input type="text" class="border p-2 w-100" required v-model="newIngredient">
                                        <button type="button" class="fs-12 bg-success border-0 text-white rounded mt-3 ms-auto" @click="saveNewIngredient" :disabled="loadingIngredient">Simpan Ke Database</button>
                                    </div>
                                    <div class="p-3 border rounded mt-3">
                                        <div class="mb-2 d-flex flex-column" v-for="(ing, index) in field.ingredients"
                                            :key="index">
                                            <select name="" class="border w-100 p-2" id="" v-model="ing.ingredient_id"
                                                required>
                                                <option :value="null" selected disabled>Pilih Bahan</option>
                                                <option :value="bahan.id" v-for="bahan in ingredients">{{ bahan.name }}
                                                </option>
                                            </select>
                                            <div class="d-flex">
                                                <input type="number" placeholder="jumlah" class="p-2"
                                                    v-model="ing.amount">
                                                <input type="text" placeholder="satuan" class="p-2" v-model="ing.unit">
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="bg-blue w-100 fs-12 p-1 mt-3 border-0 rounded text-white"
                                            @click="addNewIngredient">Tambah</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="text-end">
                            <button type="submit" class="btn bg-blue text-white" :disabled="loadingForm">
                                <span class="spinner-border spinner-border-sm" aria-hidden="true"
                                    v-show="loadingForm"></span>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { useToast } from "vue-toastification";
export default {
    data() {
        return {
            loadingForm: false,
            isLoading : false,
            loadingIngredient:false,
            loadingImport:false,
            toast: useToast(),
            field: {
                name: null,
                image: null,
                step: [
                    {
                        text: "Step 1"
                    },
                    {
                        text: "Step 2"
                    }
                ],
                ingredients: [
                    
                ]
            },

            fieldIngredientFormat: {
                ingredient_id: null,
                unit: null,
                amount: null
            },
            ingredients:[],
            foods : [],
            newIngredient:null,
            isNewIngredient: false,
            fileExcel : null
        }
    },
    methods: {
        handleExcel(event) {
            const files = event.target.files;
            const file = files[0];
            const validTypes = [
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/vnd.ms-excel'
            ];

            if (file && validTypes.includes(file.type)) {
                this.fileExcel = file;
            } else {
                this.toast.warning("Please upload a valid Excel file.");
                event.target.value = null; // Clear the input
                this.fileExcel = null
            }
        },

        async importExcel(){
            this.loadingImport = true
            if (!this.fileExcel) {
                this.toast.warning("No file selected.");
                return;
            }

            try {
                const formData = new FormData();
                formData.append('excel', this.fileExcel);

                const response = await axios.post('/food/import', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });

                this.toast.success("Import data berhasil!");
                window.location.reload()
            } catch (error) {
                this.toast.error("Import data gagal!");
                console.error(error);
            }finally{
                this.loadingImport = false
            }
        },

        handleImage(event) {
            const files = event.target.files;
            const file = files[0];
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (!validTypes.includes(file.type)) {
                this.toast.warning('Tipa file tidak sesuai!');
                this.field.image = null
                return;
            }

            this.field.image = file;
        },

        addNewStep() {
            this.field.step.push({ text: '' });
        },
        removeStep(index) {
            this.field.step.splice(index, 1);
        },
        addNewIngredient(){
            this.field.ingredients.push(
                {
                    ingredient_id: null,
                    unit: null,
                    amount: null
                }
            );
        },

        async saveNewIngredient() {
            this.loadingIngredient = true;
            try {
                const response = await axios.post('/ingredient/create', {
                    ingredient: this.newIngredient
                });
                this.toast.success("Data berhasil ditambahkan!");
                this.getIngredients();
                this.newIngredient = null;
                this.isNewIngredient = false;
            } catch (error) {
                // Ambil pesan error dari response
                const errorMessage = error.response && error.response.data ? error.response.data.msg : 'Terjadi kesalahan saat menambahkan data';
                this.toast.error(errorMessage);
            } finally {
                this.loadingIngredient = false;
            }
        },
        toggleNewIngredient(){ 
            this.isNewIngredient = !this.isNewIngredient 
        },


        async submitForm() {
            this.loadingForm = true
            try {
                const formData = new FormData();
                formData.append('image', this.field.image);
                formData.append('name', this.field.name);
                formData.append('cooking_step', JSON.stringify(this.field.step));
                formData.append('ingredients', JSON.stringify(this.field.ingredients));
                const response = await axios.post('/food', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })

                if(response.data.status ==='success'){
                    this.toast.success("Data berhasil ditambahkan!");
                    window.location.reload()

                }else{
                    this.toast.warning("Data gagal ditambahkan!")
                }
                
                
            } catch (error) {

                this.toast.error(error)
            } finally{
                this.loadingForm = false
            }
            
        },

        async getIngredients(){
            try {
                const response = await axios.get('/ingredient/getData')
                this.ingredients = response.data
            } catch (error) {
                console.log(error);
            }
        },

        async getFoods(){
            this.isLoading = true
            try {
                const response = await axios.get('/food/get-data')
                this.foods = response.data

            } catch (error) {
                console.log(error);
            }finally{
                this.isLoading = false
            }
        }
    },
    mounted(){
        this.getIngredients()
        this.getFoods()
    }
}
</script>

<style scoped>
input,
textarea, select {
    border: 0;
    padding: 10px 0;
    border-bottom: 2px solid rgb(241, 241, 241);
    outline: none;
    transition: ease .5s;
}

input::placeholder,
textarea::placeholder {
    color: rgb(196, 196, 196);
}

input:focus:not(:read-only),
textarea:focus {
    border-bottom: 2px solid #40A578;
    transition: ease .5s;
}

input:read-only {
    background-color: rgb(244, 244, 244);
    padding-left: 10px;
}
</style>
