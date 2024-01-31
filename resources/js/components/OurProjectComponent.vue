<template>
    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Projects</p>
                <h1 class="display-5 mb-5">Some Of Our Wonderful Projects</h1>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline rounded mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">Complete Projects</li>
                        <li class="mx-2" data-filter=".second">Ongoing Projects</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp" :class="{ 'first': index % 2 === 1, 'second': index % 2 === 0 }" v-for="(project, index) in ourProjects" :key="index" data-wow-delay="0.1s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" :src="getPhotoPath(project.photo)" alt="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">{{  project.name }}</h4>
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" :href="getPhotoPath(project.photo)" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square rounded-circle mx-2" href="$"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Projects End -->
</template>


<script>
export default {
    name: 'OurProjectComponent',
    data() {
        return {
            ourProjects: [
                {
                    "name": "Landscaping",
                    "photo": "service-1.jpg",
                },
                {
                    "name": "Pruning plants",
                    "photo": "service-2.jpg",
                },
                {
                    "name": "Irrigation & Drainage",
                    "photo": "service-3.jpg",
                },
                {
                    "name": "Garden Maintenance",
                    "photo": "service-4.jpg",
                },
                {
                    "name": "Green Technology",
                    "photo": "service-5.jpg",
                },
                {
                    "name": "Urban Gardening",
                    "photo": "service-6.jpg",
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
