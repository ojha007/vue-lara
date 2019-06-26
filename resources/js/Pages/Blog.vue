<template>

    <v-container
        id="grid"
        tag="section"
    >
        <div class="text-xs-center">
            <v-progress-circular v-if="loading"
                                 :size="100"
                                 color="primary"
                                 class="mt-auto"
                                 indeterminate
            ></v-progress-circular>
        </div>
        <v-layout row wrap

                  v-if="blogs"
                  v-for="blog in blogs"
                  :key="blog.id">
            <v-flex d-flex xs12 order-xs5>
                <v-layout column>
                    <v-flex>

                        <v-card >
                            <v-card-title class="headline"> {{blog.title}}</v-card-title>
                            <v-card-text tag="p" v-html="blog.content"></v-card-text>
                            <v-spacer></v-spacer>
                            <v-card-text>Published at : {{blog.publish_on}}</v-card-text>
                        </v-card>
                        <br>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
    import axios from 'axios';

    export default {
        name: 'blog',
        data() {
            return {
                loading: true,
                blogs: {}
            }
        },
        created() {
            axios.get('api/v1/blog')
                .then((result) => {
                    console.log(result.data.data);
                    this.loading = false;
                    this.blogs = result.data.data
                })
                .catch(error => {
                    console.log(error);
                    this.errored = false
                })
                .finally(() => this.loading = false)
        }
    }
</script>





