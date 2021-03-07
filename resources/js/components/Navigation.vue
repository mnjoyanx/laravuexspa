<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'home' }"
                            >Home {{ user }}</router-link
                        >
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto" v-if="!user.authenticated">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'login' }"
                            >Login</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'register' }"
                            >Register</router-link
                        >
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto" v-if="user.authenticated">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'timeline' }"
                            >Timeline</router-link
                        >
                    </li>


                    <div class="dropdown">
                        <button
                            class="btn  dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Tigran Mnjoyan
                        </button>
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                        >
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    name: "navigation",
    computed: {
        ...mapGetters({
            user: "auth/user"
        })
    }
};
</script>

<style lang="scss" scoped></style>
