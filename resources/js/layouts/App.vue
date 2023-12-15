<template>
    <div class="background">
        <router-link to="/"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#9EC8B9" class="bi bi-house-fill" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
          </svg></router-link>
        <router-view></router-view>
    </div>
</template>

<style>

* {
    margin: 0px;
    padding: 0px;
}

.background {
    display:block;
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: #1B4242;
}

.table-container {
    justify-content: center;
    align-items: center;
    width: 100%;
  }

  .overflow-container {
    overflow-x: auto; /* Adiciona uma barra de rolagem horizontal se o conteúdo for muito largo */
    width: 100%;
  }
  .table {
    margin-top: 10px;
    background-color: #9EC8B9;
    width: 100%;
    border-collapse: collapse;
  }

  .table th {
      border: 1px solid #092635;
  }

  .table th, .table td {
    border-top: 1px solid #092635;
    padding: 10px;
    overflow: hidden;
    text-align: left;
  }

  .table th {
    background-color: #5C8374;
    overflow: hidden;
  }

  .table tbody tr:nth-child(even) {
    overflow: hidden;
    background-color: #f9f9f9;
  }

  .table tbody tr:hover {
    overflow: hidden;
    background-color: #e6f7ff;
    cursor: pointer;
  }

</style>
