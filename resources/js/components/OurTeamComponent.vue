<template>
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Team</p>
                <h1 class="display-5 mb-5">Dedicated & Experienced Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" v-for="(team, index) in ourTeams" :key="index">
                    <div class="team-item rounded">
                        <img class="img-fluid" :src="getPhotoPath(team.photo)" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">{{ team.name}}</h4>
                            <p class="text-primary">Landscape Designer</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
</template>

<script>
export default {
    name: 'OurTeamComponent',
    data() {
        return {
            ourTeams: [
                {
                    "name": "Landscaping",
                    "photo": "team-1.jpg",
                },
                {
                    "name": "Pruning plants",
                    "photo": "team-2.jpg",
                },
                {
                    "name": "Irrigation & Drainage",
                    "photo": "team-3.jpg",
                },

            ]
        };
    },
    methods: {
        getPhotoPath(photo) {
            return 'assets/img/' + photo;
        },
    },
}
</script>
