<template>
    <div class="userCars">
        <h2>User Cars From Vue</h2>
        <div class="userInfo">
            <div class="infoLeft">
                <label>Nome</label>
                <input type="text" v-model="this.user.name" disabled>
            </div>
            <div class="infoRight">
                <label>Gender</label>
                <input type="text" v-model="this.user.gender" disabled>
            </div>
        </div>
        <div class="userInfo">
            <div class="infoLeft">
                <label>Email</label>
                <input type="text" v-model="this.user.email" disabled>
        </div>
            <div class="infoRight">
                <label>Age</label>
                <input type="text" v-model="this.user.age" disabled>
                <router-link :to="{ name: 'vue.edit_user', params: { id: this.user['id'] } }"><button class="button">Editar</button></router-link>
            </div>
        </div>
        <div class="table-container">
            <div class="overflow-container">
            <table class="table">
                <thead>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Ações</th>
                </thead>
                <tbody v-for="car in this.cars">
                    <tr>
                        <td>{{ car.brand }}</td>
                        <td>{{ car.name }}</td>
                        <td>{{ car.year }}</td>
                        <td>
                            <router-link style="margin-right:10px" :to="{ name: 'vue.user_cars', params: { id: user['id']} }">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                </svg>
                            </router-link>
                            <router-link :to="{ name: 'vue.edit_user', params: { id: user['id'] } }">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="pagination-buttons">
                <button class="leftButton" style="margin-top: 0px" v-if="!isFirstPage" @click="goToPage(previousPage)">Página Anterior</button>
                <button class="rightButton" style="margin-top: 0px" v-if="!isLastPage" @click="goToPage(nextPage)">Próxima Página</button>
            </div>
            <router-link v-if="user_id" :to="{ name: 'vue.create_car', params:{ user_id: this.user_id}  }">
                <button>ADD CAR</button>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cars: null,
                per_page: 2,
                user_id: null,
                page: 1,
                isFirstPage: true,
                isLastPage: true,
                filter: null,
                nextPage: 2,
                previousPage: 0,
                user: {
                name: '',
                email: '',
                age: '',
                gender: ''
                },
            };
        },
        methods:{
            fetchData(){
                const id= this.$route.params.id
                var filters = `?user_id=${id}&per_page=${this.per_page}&page=${this.page}`;
                axios.get(`/api/cars${filters}`).then(response =>{
                    const cars = response.data.data;
                    this.cars = cars
                    const meta = response.data.meta;
                    this.isFirstPage = meta.isFirstPage;
                    this.isLastPage = meta.isLastPage;
                    this.nextPage = meta.nextPage;
                    this.previousPage = meta.previousPage;
                    this.page = meta.currentPage;
                    this.user_id = id;
                });
            },
            goToPage(pageNumber) {
                if (pageNumber) {
                    this.page = pageNumber;
                    this.fetchData();
                }
            },
        },
        mounted() {
            const id= this.$route.params.id
            axios.get(`/api/users/${id}`).then(response => {
                const user = response.data.data;
                this.user = user;
            });
            this.fetchData()
        },
    };
</script>

<style scoped>
.userCars {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    box-shadow: 0 0 100px #092635;
    color: #092635;
    background-color: #9EC8B9;
    border-radius: 5px;
  }

  input:disabled {
    background-color: #FFF;
  }

.userInfo {
    position: relative;
    justify-content: space-between;
    display: flex;
}
.infoLeft{
    width: 80%;
}
.infoRight{
    width: 20%;
}

.pagination-buttons {
    position: relative;
    width: 100%;
    height: 50px;
  }

.pagination-buttons button {
    width: 45%;
}

.leftButton {
    position:absolute;
    left: 0px
}

.rightButton {
    position:absolute;
    right: 0px;
}

</style>

