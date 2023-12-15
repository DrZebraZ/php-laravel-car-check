<template>
    <div class="user-form">
      <h2>Update User From Vue</h2>
      <form @submit.prevent="submitForm">
        <UserForm :initialData="user" @updateFormData="updateFormData" />
        <button class="submitButton" type="submit">Enviar!</button>
      </form>
      <router-link :to="{ name: 'vue.user_cars', params: { id: this.$route.params.id } }">
        <button class="submitButton">Ver</button>
      </router-link>
    </div>
</template>


<script>
    import UserForm from './UserForm.vue';

    export default {
        components: {
            UserForm,
        },
        methods: {
            submitForm() {
                console.log('Dados enviados:', this.formData);
                const id = this.formData.id
                const body = {
                    name: this.formData.name,
                    email: this.formData.email,
                    age: this.formData.age,
                    gender: this.formData.gender
                }
                axios.put(`../../../api/users/${id}`, body).then(response => {
                    console.log(response.data.data);
                    this.$router.push('/')
                });
            },
            updateFormData(newFormData) {
                this.formData = { ...newFormData };
            },
        },
        data() {
            return {
                user: null,
                formData: {
                id: '',
                name: '',
                email: '',
                age: '',
                gender: ''
                },
            };
        },
        watch: {
            formData: {
                handler() {
                console.log('Dados atualizados:', this.formData);
                },
                deep: true,
            },
        },
        mounted() {
            const id = this.$route.params.id;
            axios.get(`/api/users/${id}`).then(response => {
                const user = response.data.data;
                console.log(user)
                this.user = user;
            });
        },
    };
</script>

<style>
.submitButton {
    margin-bottom: 10px;
}
</style>
