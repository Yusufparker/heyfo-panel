<template>
    <section class="sidebar shadow fixed-top" id="sidebar">
        <div class="logo container  d-flex justify-content-center p-4">
            <h5 class="text-blue fw-bold">{{ title }}</h5>
        </div>
        <div class="sidebar-menu mt-4">
            <a href="/" class="p-3 d-block  ps-5 pe-4 fs-12" :class="{ 'active': url === '/' }">
                <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-speedometer me-3" viewBox="0 0 16 16">
                    <path
                        d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                    <path fillRule="evenodd"
                        d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0" />
                </svg>
                Dashboard
            </a>
            <a href="/food" class="p-3 d-block  ps-5 pe-4 fs-12  " :class="{ 'active': isActive('food') }">
                <i class="fa-solid fa-bowl-food me-3"></i>
                Makanan
            </a>
            <a href="/article" class="p-3 d-block  ps-5 pe-4 fs-12  " :class="{ 'active': isActive('article') }">
                <i class="fa-regular fa-newspaper me-3"></i>
                Artikel
            </a>
            <a href="/setting" class="p-3 d-block  ps-5 pe-4 fs-12  " :class="{ 'active': isActive('setting') }">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-gear me-3" viewBox="0 0 16 16">
                    <path
                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                    <path
                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                </svg>
                Pengaturan
            </a>

        </div>
    </section>
    <section class="navbar shadow-sm p-3 ps-4 pe-4 bg-white fixed-top d-flex justify-content-between" id="navbar">
        <div class="btn-humberger">
            <button class="border-0 bg-white" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.21875 20.25C4.21875 20.0262 4.30765 19.8116 4.46588 19.6534C4.62411 19.4951 4.83872 19.4062 5.0625 19.4062H21.9375C22.1613 19.4062 22.3759 19.4951 22.5341 19.6534C22.6924 19.8116 22.7812 20.0262 22.7812 20.25C22.7812 20.4738 22.6924 20.6884 22.5341 20.8466C22.3759 21.0049 22.1613 21.0938 21.9375 21.0938H5.0625C4.83872 21.0938 4.62411 21.0049 4.46588 20.8466C4.30765 20.6884 4.21875 20.4738 4.21875 20.25ZM4.21875 13.5C4.21875 13.2762 4.30765 13.0616 4.46588 12.9034C4.62411 12.7451 4.83872 12.6562 5.0625 12.6562H21.9375C22.1613 12.6562 22.3759 12.7451 22.5341 12.9034C22.6924 13.0616 22.7812 13.2762 22.7812 13.5C22.7812 13.7238 22.6924 13.9384 22.5341 14.0966C22.3759 14.2549 22.1613 14.3438 21.9375 14.3438H5.0625C4.83872 14.3438 4.62411 14.2549 4.46588 14.0966C4.30765 13.9384 4.21875 13.7238 4.21875 13.5ZM4.21875 6.75C4.21875 6.52622 4.30765 6.31161 4.46588 6.15338C4.62411 5.99515 4.83872 5.90625 5.0625 5.90625H21.9375C22.1613 5.90625 22.3759 5.99515 22.5341 6.15338C22.6924 6.31161 22.7812 6.52622 22.7812 6.75C22.7812 6.97378 22.6924 7.18839 22.5341 7.34662C22.3759 7.50486 22.1613 7.59375 21.9375 7.59375H5.0625C4.83872 7.59375 4.62411 7.50486 4.46588 7.34662C4.30765 7.18839 4.21875 6.97378 4.21875 6.75Z"
                        fill="black" />
                </svg>
            </button>
        </div>
        <div class="profile d-flex">
            <div class="position-relative">
                <img src="/img/admin.jpg" alt="" class="me-3 rounded-circle" @click="toggleDropDown"
                    style="cursor: pointer">
                <div class="drop position-absolute bg-white rounded border shadow-sm  overflow-hidden"
                    :class="isDropDown ? 'active' : ''">
                    <a href="/setting" class="d-block text-decoration-none fs-12"><i class="bi bi-person-fill me-2"
                            @click="toggleDropDown"></i> Akun</a>
                    <a class="d-block text-decoration-none fs-12 text-danger" data-bs-toggle="modal"
                        data-bs-target="#logout-modal" @click="toggleDropDown"><i
                            class="bi bi-box-arrow-right me-2"></i>
                        Logout</a>
                </div>
            </div>
            <div class="d-flex flex-column align-self-center">
                <span class="fw-bold">{{auth.name}}</span>
                <span class="">{{auth.email}}</span>
            </div>
        </div>
    </section>
    <!-- export modal -->
    <div class="modal fade " id="logout-modal" tabindex="-1" aria-labelledby="logout-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-5 text-center shadow">
                <h1 class="modal-title fs-5">Apakah anda yakin?</h1>
                <div class="mt-3 mb-3">
                    <img src="/img/logout.png">
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger ya" data-bs-dismiss="modal"
                        @click="handleLogout">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-menu mt-4">
                <a href="/" class="p-3 d-block  ps-5 pe-4 fs-12" :class="{ 'active': url === '/' }">
                    <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-speedometer me-3" viewBox="0 0 16 16">
                        <path
                            d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                        <path fillRule="evenodd"
                            d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0" />
                    </svg>
                    Dashboard
                </a>
                <a href="/food" class="p-3 d-block  ps-5 pe-4 fs-12  " :class="{ 'active': isActive('food') }">
                    <i class="fa-solid fa-bowl-food me-3"></i>
                    Makanan
                </a>
                <a href="/article" class="p-3 d-block  ps-5 pe-4 fs-12  " :class="{ 'active': isActive('article') }">
                    <i class="fa-regular fa-newspaper me-3"></i>
                    Artikel
                </a>
                <a href="/setting" class="p-3 d-block  ps-5 pe-4 fs-12  " :class="{ 'active': isActive('setting') }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-gear me-3" viewBox="0 0 16 16">
                        <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                        <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                    </svg>
                    Pengaturan
                </a>



            </div>

        </div>
    </div>
    <slot></slot>
</template>

<script>
export default {
    props:[
        'auth'
    ],
    data() {
        return {
            url: window.location.pathname,
            title: "Dashboard",
            isDropDown: false,
        };
    },
    methods: {

        isActive(prefix) {
            return this.url.startsWith('/' + prefix);
        },
        toggleDropDown() {
            this.isDropDown = !this.isDropDown
        },
        async handleLogout() {
            try {
                await axios.post('/logout')
                window.location.href = '/login'
            } catch (error) {
                console.log(error);
            }
        }


    },

};
</script>

<style scoped>
.modal button {
    padding: 5px 20px;
}

.modal img {
    width: 70px;
}

.btn-humberger button {
    display: none;
}

@media only screen and (max-width: 768px) {
    .btn-humberger button {
        display: block;
    }
}
</style>