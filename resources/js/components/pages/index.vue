<template>
    <v-app>
        <navBar />

        <v-content>
            <v-container grid-list-xs class="mx-auto">
                <div class="mt-4">
                    <h1>Red Core Solutions Exam</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Voluptate hic est, modi tenetur ipsam neque omnis, at
                        libero facilis, consectetur esse vero adipisci
                        consequuntur odio autem earum a nam. Corrupti.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Harum veritatis maxime, non saepe distinctio inventore
                        reprehenderit explicabo nostrum, asperiores amet commodi
                        aperiam excepturi quibusdam! Aut pariatur sint ipsa
                        eveniet voluptas?
                    </p>
                </div>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
import navBar from "../navbar.vue";
export default {
    components: {
        navBar
    }
};
</script>
