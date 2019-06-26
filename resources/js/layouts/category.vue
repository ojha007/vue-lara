<template>
    <v-flex
        xs12
        sm3
        fixed
        md3>
        <v-flex
            d-flex
        >
            <v-card  hover>
                <v-card-title class="headline" text-center>
                    Category
                </v-card-title>
                <v-card-text>

                    <v-flex
                        v-for="category in categories "
                        :key="category.id"
                        mb5


                    >
                        <router-link
                            :to="'/forum/category/'+category.slug"
                        >
                            <v-card
                                text-center
                            >
                                <v-card-text
                                >{{ category.title }}
                                </v-card-text>
                            </v-card>
                        </router-link>
                    </v-flex>


                </v-card-text>
            </v-card>
        </v-flex>
    </v-flex>
</template>

<script>


    export default {
        name: "CategoryList",
        data() {
            return {
                error: false,
                dialog:false,
            }
        },
        computed: {

            categories() {
                return this.$store.state.categories;
            }
        },
        created() {
            this.$store.dispatch("fetchCategory");

        }
    }
</script>

<style scoped>

</style>
