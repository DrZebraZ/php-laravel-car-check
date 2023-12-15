<template>
    <div class="container">
        <form @submit.prevent="submitForm">
            <div class="filter">
                <div class="filterInput">
                    <label for="Buscar">Buscar</label>
                    <input type="text" v-model="this.filter">
                </div>
                <div class="filterButton">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <div class="table-container">
            <div class="overflow-container">
            <table class="table">
                <thead>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Gênero</th>
                    <th> Ações</th>
                </thead>
                <tbody v-for="user in users">
                    <tr>

                        <td>{{ user['name'] }}</td>
                        <td>{{ user['email'] }}</td>
                        <td>{{ user['age'] }}</td>
                        <td>{{ user['gender'] }}</td>
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
        </div>
        <div class="pagination-buttons">
            <button class="leftButton" style="margin-top: 0px" v-if="!isFirstPage" @click="goToPage(previousPage)">Página Anterior</button>
            <button class="rightButton" style="margin-top: 0px" v-if="!isLastPage" @click="goToPage(nextPage)">Próxima Página</button>
        </div>
        <router-link :to="{ name: 'vue.create_user' }">
            <button>ADD USER</button>
        </router-link>
    </div>
</template>

<script>
export default{
    data(){
        return{
            users: null,
            per_page: 5,
            page: 1,
            isFirstPage: true,
            isLastPage: true,
            filter: null,
            nextPage: 2,
            previousPage: 0
        }
    },
    mounted() {
    this.fetchData();
  },
    methods: {
        fetchData() {
            var filters = `?per_page=${this.per_page}&page=${this.page}`;
            if(this.filter){
                filters += `&filter=${this.filter}`;
            }
            axios.get(`/api/users${filters}`).then(response => {
                this.users = response.data.data;
                const meta = response.data.meta;
                this.isFirstPage = meta.isFirstPage;
                this.isLastPage = meta.isLastPage;
                this.nextPage = meta.nextPage;
                this.previousPage = meta.previousPage;
                this.page = meta.currentPage;
            });
        },
        submitForm() {
            this.fetchData();
        },
        goToPage(pageNumber) {
        if (pageNumber) {
            this.page = pageNumber;
            this.fetchData();
        }
        },
    },
}
</script>



<style scoped>
.container {
  margin: auto;
  width: 80%;
  align-items: center;
  padding: 20px;
  box-shadow: 0 0 100px #092635;
  color: #092635;
  background-color: #9EC8B9;
  border-radius: 5px;
  }



  .filter{
    display: flex;
    position: relative;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    margin-bottom: 10px;
  }
  .filterInput {
    width: 88%;
  }
  .filterButton {
    position: absolute;
    width: 10%;
    bottom: 0px;
    right: 0px;
  }



.router-link-exact-active {
  color: #092635;
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

