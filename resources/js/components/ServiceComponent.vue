<template>
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Services</p>
                <h1 class="display-5 mb-5">Services That We Offer For You</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" v-for="(service, index) in services" :key="index" data-wow-delay="0.2s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" :src="getPhotoPath(service.photo)" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" :src="getPhotoPath(service.icon)" alt="Icon">
                            </div>
                            <h4 class="mb-3">{{ service.name }}</h4>
                            <p class="mb-4">{{ service.text }}</p>
                            <a class="btn btn-sm" href="#"><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
</template>

<script>
export default {
    name: 'ServiceComponent',
    data() {
        return {
            services: [
                {
                    "name": "Landscaping",
                    "text": "Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.",
                    "photo": "service-1.jpg",
                    "icon": "icon/icon-3.png",
                },
                {
                    "name": "Pruning plants",
                    "text": "Erat ipsum justo amet duo et elitr dolor, diam stet diam sed stet.",
                    "photo": "service-2.jpg",
                    "icon": "icon/icon-6.png",
                },
                {
                    "name": "Irrigation & Drainage",
                    "text": "Erat ipsum justo amet duo et, est duo duo eos lorem sed diam stet diam sed stet.",
                    "photo": "service-3.jpg",
                    "icon": "icon/icon-5.png",
                },
                {
                    "name": "Garden Maintenance",
                    "text": "Erat ipsum justo amet duo et, est duo duo eos lorem sed diam stet diam sed stet.",
                    "photo": "service-4.jpg",
                    "icon": "icon/icon-4.png",
                },
                {
                    "name": "Green Technology",
                    "text": "Erat ipsum justo amet duo et, eos lorem sed diam stet diam sed stet.",
                    "photo": "service-5.jpg",
                    "icon": "icon/icon-8.png",
                },
                {
                    "name": "Urban Gardening",
                    "text": "Erat ipsum justo amet duo et, est duo duo eos lorem sed diam stet diam sed stet.",
                    "photo": "service-6.jpg",
                    "icon": "icon/icon-4.png",
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
