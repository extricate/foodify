<template>
    <div>
        <ul>
            <li v-for="recipe in recipes" v-text="recipe"></li>
        </ul>

        <input type="text" vModel="newRecipe" @blur="addRecipe">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                recipes: [],
                newRecipe: 'newRecipe'
            }
        },

        created() {
            axios.get('/recipes').then(response => (this.recipes = response.data));

            window.Echo.channel('recipes').listen('NewRecipe', ({recipe}) => {
                this.recipes.push(recipe.name);
            });
        },

        methods: {
            addRecipe() {
                axios.post('/recipes', {
                    name: this.newRecipe
                });

                // push it to the list
                this.recipes.push(this.newRecipe);

                // clear input
                this.newRecipe = '';
            }
        }
    }
</script>
