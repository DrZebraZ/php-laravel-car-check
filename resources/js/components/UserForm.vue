<template>
    <div className="userForm">
      <slot :formData="formData"></slot>
      <div className="form-part">
        <label>Nome</label>
        <input type="text" name="name" v-model="formData.name" required>
      </div>
      <div className="form-part">
        <label>Email</label>
        <input type="text" name="email" v-model="formData.email" required>
      </div>
      <div className="form-part">
        <label>Idade</label>
        <input type="number" name="age" v-model="formData.age" required>
      </div>
      <div className="form-part">
        <label>Gênero</label>
        <select name="gender" v-model="formData.gender" required>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
      </div>
    </div>
</template>

<script>
  export default {
    props: ['initialData'], // Adicionado para receber os dados iniciais
    data() {
      return {
        formData: {
          name: '',
          email: '',
          age: '',
          gender: ''
        },
      };
    },
    watch: {
      initialData: {
        handler(newData) {
          // Atualize o formData com os dados recebidos
          this.formData = { ...newData };
        },
        immediate: true, // Garante que a função de observação seja chamada imediatamente
      },
      formData: {
        handler(newValue) {
          this.$emit('updateFormData', newValue);
        },
        deep: true,
      },
    },
    emits: ['updateFormData'],
  };
  </script>


<style>
.user-form {
  max-width: 400px;
  margin: auto;
  padding: 20px;
  box-shadow: 0 0 100px #092635;
  color: #092635;
  background-color: #9EC8B9;
  border-radius: 5px;
}

.form-group {
  margin-bottom: 15px;
}

h1 {
    margin-bottom: 20px; /* Adiciona espaço abaixo do h1 para separar do formulário */
    text-align: center; /* Centraliza apenas o texto do h1 */
  }

label {
  display: block;
  margin-top:10px;
  margin-bottom: 5px;
  font-weight: bold;
}

input,
select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #092635;
  color: #9EC8B9;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.userForm {
    margin-bottom: 10px;
}

</style>
