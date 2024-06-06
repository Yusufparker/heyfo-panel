<template>
    <div class="body">
        <div class="container">

            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <img src="/img/welcome.png" class="img-welcome" alt="">
                </div>
                <div class="col-md-4 login flex-column  d-flex align-items-center p-4 justify-content-center">
                    <!-- <h2 class="mb-4 text-white">LOGIN</h2> -->
                    <div class="bg-white border p-4 shadow w-100 rounded">
                        <form @submit.prevent="login" class="fs-14">
                            <p class="text-center text-blue fs-16">Masuk dengan akun</p>
                            <div class="mb-3 mt-5">
                                <label for="email" class="text-blue">Email</label>
                                <input type="email" id="email" class="w-100" v-model="email" placeholder="Username"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="text-blue">Password</label>
                                <input type="password" id="password" class="w-100" v-model="password"
                                    placeholder="Password" required>
                            </div>
                            <button type="submit" class="w-100 mt-3" :disabled="isLoading">
                                <span class="spinner-border spinner-border-sm" aria-hidden="true"
                                    v-show="isLoading"></span>
                                <!-- <span role="status">Loading...</span> -->
                                MASUK
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
import { useToast } from "vue-toastification";
export default {
    data() {
        return {
            email: '',
            password: '',
            error: 'Gagal masuk, periksa email dan password anda!',
            isLoading: false,
            toast: useToast()
        };
    },
    methods: {
        async login() {
            this.isLoading = true
            try {
                const response = await axios.post('/login', {
                    email: this.email,
                    password: this.password
                });
                window.location.href = '/'
                // this.isLoading = false
            } catch (error) {
                this.toast.error(this.error);
                this.isLoading = false
            }
        }
    }
};
</script>

<style scoped>
.body {
    background: #17965d;
    background: linear-gradient(34deg, #155f3e 0%, #63d7a3 100%);
}

.login {
    height: 100vh;
}


input {
    border: 0;
    padding: 10px 0;
    border-bottom: 2px solid rgb(241, 241, 241);
    outline: none;
    transition: ease .5s;
}

input::placeholder {
    color: rgb(196, 196, 196);
}

input:focus {
    border-bottom: 2px solid #40A578;
    transition: ease .5s;

}

button {
    border: 0;
    padding: 10px;
    background-color: #40A578;
    color: white;
    transition: all .3s;
}

button:hover {
    background-color: #1d6444;
    transition: all .3s;
}

button:disabled {
    background-color: #59b48b;
}

button:disabled:hover {
    background-color: #59b48b;
    cursor: no-drop;
}


.error {
    color: red;
    margin-top: 10px;
}

.img-welcome {
    width: 90%;
}

@media only screen and (max-width: 768px) {
    .img-welcome {
        display: none;
    }
}
</style>
