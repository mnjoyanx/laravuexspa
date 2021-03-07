<template>
    <div>
        <h1 class="text-center mb-5">Register page</h1>

        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="alert alert-danger" v-if="errors">
                            {{ errMessages }}
                    </div>
                    <form @submit.prevent="registerHandler">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter email"
                                v-model="register.name"
                            />
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input
                                type="email"
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter email"
                                v-model="register.email"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="exampleInputPassword1"
                                placeholder="Password"
                                v-model="register.password"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
export default {
    name: "register",
    data() {
        return {
            register: {
                name: '',
                email: '',
                password: '',
            },
        }
    },
    computed: {
        ...mapGetters({
            'errors': 'auth/errors'
        }),
        errMessages() {
            if(this.errors) {
                return Object.values(this.errors).flat()
            }
        }
    },
    methods: {
        ...mapActions({
            registerAction: 'auth/register'
        }),
        registerHandler() {
            this.registerAction(this.register)
        }
    }
};
</script>


<style lang="scss" scoped>
    .has-error {
        border: 1px solid red
    }
</style>
