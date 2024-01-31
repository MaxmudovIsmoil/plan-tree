<template>
    <div
        class="d-flex justify-content-center align-items-center"
        style="height: 100vh"
    >
        <div class="rounded p-3 shadow-lg">
            <form style="width: 300px" @submit.prevent="login">
                <h4 class="mb-4">Войти</h4>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        v-model="username"
                        placeholder="Имя пользователя"
                        aria-describedby="emailHelp"
                        name="username"
                        required
                        autocomplete="username"
                        autofocus
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="password"
                        class="form-control"
                        v-model="password"
                        placeholder="Пароль"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                </div>
                <div class="row align-items-center">
                    <div class="col-4">
                        <button
                            style="width: 5rem"
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            Войти
                        </button>
                    </div>
                    <div class="col-8 text-end">
                        <p class="mb-1 text-end">
                            <a href="">Для администратора</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {useToast} from 'vue-toastification';
import cookie from 'js-cookie';
import {useRouter} from 'vue-router';

export default {
    name: "LoginView",
    data() {
        return {
            username: '',
            password: '',
        };
    },
    setup() {
        const toast = useToast();
        const router = useRouter();
        return {toast, router};
    },
    methods: {
        // Method to handle the login process
        async login() {
            // Make a POST request to the login endpoint with the username and password as data
            await axios
                .post('/api/login', {
                    username: this.username,
                    password: this.password,
                })
                .then((res) => {
                    // If the request is successful, display a success toast message
                    this.toast.success('С возвращением, вы вошли в систему');

                    // Extract the access token and user info from the response data
                    const access_token = res.data.data.accessToken;
                    const user_info = res.data.data.user;

                    // Set cookies for authentication and login state with an expiration time of 1 day
                    cookie.set('auth_token', access_token, {expires: 1});
                    cookie.set('logged_in', 'yes', {expires: 1});

                    // Store the user info in local storage
                    localStorage.setItem('userInfo', JSON.stringify(user_info));

                    // Redirect to the '/' route
                    this.router.push('/');
                })
                .catch((err) => {
                    // If the request fails, handle the error
                    if (err.response.status === 401) {
                        // If the status code is 401 (Unauthorized), display an error toast with a specific message
                        this.toast.error(
                            'Вы ввели неправильный логин или пароль, проверьте и повторите попытку.'
                        );
                    } else {
                        // For any other status code, display an error toast with a generic message
                        this.toast.error(`${err.message}`);
                    }
                });
        },
    },
};
</script>
