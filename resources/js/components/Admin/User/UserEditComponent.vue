<template>
    <div class="container">
        <div class="col-md-4 card m-2">
            <img src="#"
                 class="height_250" alt="User image">
            <h3 class="card-header"> {{ user.name }}</h3>
            <div class="card-body">
                <p class="card-text">Почта: {{ user.email }}</p>
                <p class="card-text">Текущая роль: {{ user.role.role }}</p>
            </div>

                <label for="formSelectCategories">Поменять роль:</label>
                <select id="formSelectCategories" name="category_id" class="form-control m-1">
                    <option v-for="role in roles" v-bind:value="role.role" >{{ role.role }}</option>
                </select>
                <button dusk="submit" type="submit" class="btn btn-success m-2">Внести изменения</button>

        </div>
    </div>
</template>

<script>
export default {
    name: "UserEditComponent",
    props: [
        'user',
        'roles',
    ],
    mounted() {
        console.log(this.roles)
    }
}
</script>

<style scoped>

</style>
