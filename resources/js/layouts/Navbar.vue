<template>
    <div>
        <v-toolbar
            dark
        >
            <v-toolbar-side-icon
                dark
                @click.stop="drawer = !drawer"
            ></v-toolbar-side-icon>
            <v-toolbar-title>Vue-Lara</v-toolbar-title>
            <v-spacer></v-spacer>
            <div
            >


                <v-toolbar-items
                    class="hidden-sm-and-down"
                >
                    <v-menu

                        offset-y
                        :close-on-content-click="false"
                        :nudge-width="500"
                        :nudge-top="0"
                        v-model="menu"
                          >
                        <v-icon
                            dark
                            slot="activator"
                            @click.prevent="getNotification"
                        >
                            notifications

                        </v-icon>
                        <v-card mt-5>
                            <v-card-title class="headline">Notifications</v-card-title>
                            <v-card-text>

                            </v-card-text>
                        </v-card>
                    </v-menu>

                    <router-link
                        v-for="item in items"
                        v-if="item.show"
                        :key="item.key"
                        :to="item.to"
                    >
                        <v-btn flat>{{item.title}}</v-btn>
                    </router-link>
                </v-toolbar-items>
            </div>
        </v-toolbar>

        <div>
            <v-layout
            >
                <v-navigation-drawer
                    v-model="drawer"
                    :mini-variant="mini"
                    absolute
                    dark
                    color="black"
                    style="margin-top: 64px; "
                >

                    <v-list class="pa-1">
                        <v-list-tile v-if="mini" @click.stop="mini = !mini">
                            <v-list-tile-action>
                                <v-icon>chevron_right</v-icon>
                            </v-list-tile-action>
                        </v-list-tile>
                        <v-list-tile avatar tag="div">
                            <v-list-tile-avatar>
                                <img src="https://randomuser.me/api/portraits/men/85.jpg">
                            </v-list-tile-avatar>

                            <v-list-tile-content>
                                <v-list-tile-title>John Leider</v-list-tile-title>
                            </v-list-tile-content>

                            <v-list-tile-action>
                                <v-btn icon @click.stop="mini = !mini">
                                    <v-icon>chevron_left</v-icon>
                                </v-btn>
                            </v-list-tile-action>
                        </v-list-tile>
                    </v-list>

                    <v-list class="pt-0">
                        <v-divider
                            dark

                        ></v-divider>
                        <router-link
                            v-for="item in items"
                            v-if="item.show"
                            :key="item.key"
                            :to="item.to"
                        >
                            <v-list-tile
                            >
                                <v-list-tile-action>
                                    <v-icon
                                        dark
                                    >{{ item.icon }}
                                    </v-icon>
                                </v-list-tile-action>

                                <v-list-tile-content>
                                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </router-link>

                        <v-list-tile
                        >
                            <v-list-tile-action>
                                <v-switch
                                    value=""
                                    label="Turn On Light "
                                >
                                </v-switch>
                            </v-list-tile-action>

                        </v-list-tile>
                    </v-list>

                </v-navigation-drawer>
            </v-layout>
        </div>
    </div>
</template>
<script>


    export default {
        name: "Navbar",
        data() {
            return {

                drawer: false,
                notification: false,
                menu: false,
                mini: false,
                items: [
                    {title: 'Blogs', to: '/blog', show: true, icon: 'chat'},
                    {title: 'Ask Question', to: '/ask-question', show: User.logedIn(), icon: 'question_answer'},
                    {title: 'Forum', to: '/forum', show: true, icon: 'forum'},
                    {title: 'Login', to: '/login', show: !User.logedIn(), icon: 'person'},
                    {title: 'Register', to: '/register', show: !User.logedIn(), icon: 'edit'},
                    {title: 'Add Category', to: '/add-category', show: User.logedIn(), icon: 'book'},
                    {title: 'Logout', to: '/logout', show: User.logedIn(), icon: 'logout'},

                ]
            }
        },
        created() {

            EventBus.$on('logout', () => {
                User.logout();
                window.location = '/login';
            })
        },
        computed: {
            loginCheck() {
                return this.$store.state.currentUser;
            },

        },
        methods: {
            getNotification() {
                this.notification = true;

            }
        }
    }
</script>

<style scoped>
    a {
        text-decoration: none;
    }
</style>
