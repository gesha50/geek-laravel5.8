<template>
    <div class="d-flex flex-wrap justify-content-start row">
        <div v-for="user in users" class="col-md-4 card m-2">

            <div v-if="showSuccessMessage" class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ successMessage }}</strong>
            </div>

            <div v-if="showErrorMessage" class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ errorMessage }}</strong>
            </div>


            <img src="#"
                 class="height_250" alt="User image">
            <h3 class="card-header"> {{ user.name }}</h3>
            <div class="card-body">
                <p class="card-text">Почта: {{ user.email }}</p>
                <p v-if="user.role.role" class="card-text">Текущая роль: {{ user.role.role }}</p>
            </div>

            <label for="formSelectCategories">Поменять роль:</label>
            <select v-model="user.role" id="formSelectCategories" name="category_id" class="form-control m-1">
                <option v-for="role in roles" v-bind:value="role">{{ role.role }}</option>
            </select>
            <button @click="send" class="btn-danger btn m-2">Внести изменения</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserEditComponent",
    props: [
        'initialUsers',
        'initialRoles',
    ],
    data: function (){
        return {
            users: {},
            roles: {},
            showSuccessMessage: false,
            successMessage: '',
            showErrorMessage: false,
            errorMessage: '',
        }
    },
    mounted() {
        this.users = this.initialUsers
        this.roles = this.initialRoles
        console.log(this.initialUsers)
    },
    methods: {
        send () {
            axios.post('/api/admin/user/edit/' + this.user.id, this.user)
            .then(response => {
                this.showSuccessMessage = true
                this.successMessage = 'Вы поменяли роль пользователя!'
            })
        },
    },
}
</script>

<style scoped>

</style>
