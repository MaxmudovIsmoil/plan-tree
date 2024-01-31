<script>
import {onMounted, ref} from 'vue';
import {useRouter} from 'vue-router';
import cookie from 'js-cookie';

export default {
    name: 'App',
    setup() {
        const router = useRouter();
        const loggedInCookie = ref(cookie.get('logged_in'));

        onMounted(async () => {
            // Check if the 'logged_in' cookie is set to 'yes'
            if (loggedInCookie.value === 'yes') {
                // Redirect to '/'
                await router.push('/');
            } else {
                // Redirect to '/login'
                await router.push('/login');
            }
        });

        return {router};
    },
};

</script>

<template>
    <RouterView/>
</template>
