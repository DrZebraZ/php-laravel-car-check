<template>
    <div class="user-form">
      <h2>Create User From Vue</h2>
      <form @submit.prevent="submitForm">
        <UserForm :initialData="user" @updateFormData="updateFormData" />
        <button type="submit">Enviar!</button>
      </form>
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
                const body = {
                    name: this.formData.name,
                    email: this.formData.email,
                    age: this.formData.age,
                    gender: this.formData.gender
                }
                axios.post(`../../api/users`, body).then(response => {
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
        }
    };
</script>

