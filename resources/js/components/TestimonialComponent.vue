<template>
    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">Testimonial</p>
                    <h1 class="display-5 mb-5">What Our Clients Say About Us!</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                    <a class="btn btn-primary py-3 px-4" href="">See More</a>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item" v-for="(post, index) in testimonial" :key="index" >
                            <img class="img-fluid rounded mb-3" :src="getPhotoPath(post.photo)" alt="Photo">
                            <p class="fs-5">{{ post.text }}</p>
                            <h4>{{ post.name }}</h4>
                            <span>{{ post.position }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
</template>

<script>
export default {
    name: 'TestimonialComponent',
    data() {
        return {
            testimonial: [
                {
                    "name": "Landscaping",
                    "text": "Erat ipsum justo amet duo et duo eos lorem sed diam stet diam sed stet.",
                    "photo": "testimonial-1.jpg",
                    "position": "test",
                },
                {
                    "name": "Pruning plants",
                    "text": "Erat ipsum justo amet duo et, diam stet diam sed stet.",
                    "photo": "testimonial-2.jpg",
                    "position": "profession",
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
