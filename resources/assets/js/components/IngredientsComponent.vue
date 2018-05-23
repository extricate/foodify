<template>
    <div class="ingredients-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><strong>Quantity</strong></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(row, index) in rows">
                    <td><input type="text" v-model="row.name"></td>
                    <td><input type="text" v-model="row.quantity"></td>
                    <td>
                        <a v-on:click="removeElement(index);" class="btn btn-danger text-white"><i
                                class="fal fa-trash"></i></a>
                    </td>
                    <td class="hidden"><input name="ingredients[]"  :value="row.name + ',' + row.quantity"></td>
                </tr>

                </tbody>
            </table>
        </div>
        <a class="btn btn-primary text-white" @click="addRow">Add ingredient</a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rows: []
            }
        },
        methods: {
            addRow: function () {
                var elem = document.createElement('tr');
                this.rows.push({
                    name: "",
                    quantity: "",
                });
            },
            removeElement: function (index) {
                this.rows.splice(index, 1);
            },
        }
    };
</script>