<template>

    <v-container>
        <v-layout justify-center>
            <v-flex sm12 xs12 md8>
                <v-alert
                    v-model="alert"
                    dismissible
                    danger>
                    {{alertMessage}}
                </v-alert>
                <v-card >

                    <v-form @submit.prevent="submitCategory">
                        <v-card-title class="headline justify-center">
                            Add New Category Title ?
                        </v-card-title>
                        <v-card-text>

                            <v-flex>
                                <v-text-field
                                    solo
                                    placeholder="Enter Category  Title ?"
                                    v-model="form.title"
                                    :class="{ 'is-invalid': form.errors.has('title') }"
                                    counter="10"
                                    :rules="categoryTitle"
                                >

                                </v-text-field>
                                <has-error :form="form" field="title"></has-error>


                            </v-flex>

                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="success" type="submit" round>
                                Submit
                                <v-icon right>
                                    cloud_upload
                                </v-icon>
                            </v-btn>
                            <v-btn color="error" round type="clear">
                                Clear
                                <v-icon right>
                                    clear
                                </v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>


</template>
<script>

    import Storage from '../helpers/Storage';

    export default {
        name: 'category',
        data() {
            return {
                alert:false,
                alertMessage:'',
                form: new Form({
                    title: '',
                    token: Storage.getToken(),
                }),
                categoryTitle: [
                    v => !!v || 'Title is required',
                    v => v.length <= 10 || 'Title must be less than 10 characters'
                ],
            }
        },
        methods: {
            submitCategory() {
                axios.post('api/v1/category ', this.form)
                    .then(res => {
                        if (res.data.status === 201) {
                            this.$router.push({
                                name: 'forum'
                            })
                        }
                        if (res.data.status === 502) {
                            this.alertMessage=res.data.error;
                            this.alert=true;
                        }

                    })
                    .catch(err => {
                        console.log(err.message);
                    })

            }
        }

    }
</script>





