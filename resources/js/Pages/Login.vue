<template>
    <div>
        <v-container style="padding-top: 100px;">
            <v-layout>

                <v-flex xs12 sm6 offset-sm3>
                    <v-alert
                        :value="alert"
                        type="error"
                        mb-5
                        dismissible
                    >
                        UnAuthorized
                    </v-alert>

                    <br>
                    <v-card>
                        <v-card-title>
                            <h3 class="headline">Login</h3>
                        </v-card-title>
                        <v-card-text>
                            <v-flex md12>
                                <v-form @submit.prevent="login">
                                    <v-flex>
                                        <v-text-field
                                            v-model="form.email"
                                            label="Email"
                                            prepend-inner-icon="chat"
                                            solo
                                            required
                                            >
                                        </v-text-field>
                                    </v-flex>
                                    <v-flex>
                                        <v-text-field
                                            v-model="form.password"
                                            label="Password"
                                            type="password"
                                            :type="show ? 'text' : 'password'"
                                            :append-icon="show ? 'visibility' : 'visibility_off'"
                                            @click:append="show = !show"
                                            prepend-inner-icon="lock"
                                            solo
                                            required>

                                        </v-text-field>

                                    </v-flex>
                                    <v-flex>
                                        <v-switch label="Remember me">

                                        </v-switch>
                                    </v-flex>
                                    <v-flex offset-md3>
                                        <v-btn type='submit' color="primary">Login</v-btn>
                                        <v-btn color="error">Cancel</v-btn>
                                    </v-flex>

                                </v-form>
                            </v-flex>
                        </v-card-text>


                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>
<script>

    export default {

        name: "Login",
        data() {
            return {
                alert: false,
                error: {},
                show: false,
                form: new Form({
                    email: "",
                    password: "",
                })
            }
        },
        created() {
            if (User.logedIn()) {

            }
        },
        methods: {
            login() {
                User.login(this.form).then(res => {
                    this.$router.push({
                        name: 'blog'
                    });
                });

            }
        }
    }
</script>

<style scoped>

</style>
