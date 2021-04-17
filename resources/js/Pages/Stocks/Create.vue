<template>
    <div>
        <Layout>
            <div class="flex justify-center w-full">
                <div class="bg-white flex flex-col w-1/3 my-20 p-6">
                    <h2 class="text-lg">Stock Form</h2>
                    <form 
                        id="stock-form"
                        name="stock-form"
                        v-on:submit.prevent="submit"
                    >
                        <div class="flex flex-col pt-6">
                            <label for="id">ID</label>
                            <input 
                                type="text"
                                id="id"
                                name="id"
                                v-model="form.id"
                                autocomplete="off"
                            />
                            <div class="text-red-700 text-sm">
                                {{ errors.id }}
                            </div>
                            {{ form.id }}
                        </div>     

                        <div class="flex flex-col pt-6">
                            <label for="description">Description</label>
                            <input 
                                type="text"
                                id="description"
                                name="description"
                                v-model="form.description"
                                autocomplete="off"
                            />
                            <div class="text-red-700 text-sm">
                                {{ errors.description}}
                            </div>
                        </div>

                        <div class="flex flex-col pt-6">
                            <label for="stock_category_id">Stock Category ID</label>
                            <select name="stock_category_id" id="stock_category_id" v-model="form.stock_category_id">
                              <option value=""></option>
                              <option v-for="item in stock_categories" :key="item.id" :value="item.id">{{item.id}}</option>
                          </select>
                            <div class="text-red-700 text-sm">
                                {{ errors.stock_category_id }}
                            </div>
                            {{ form.stock_category_id }}
                        </div>     

                        <div class="flex flex-col pt-6">
                            <label for="uom">UoM</label>
                            <input 
                                type="text"
                                id="uom"
                                name="uom"
                                v-model="form.uom"
                            />
                            <div class="text-red-700 text-sm">
                                {{ errors.uom}}
                            </div>
                        </div>

                        <div class="flex flex-col pt-6">
                            <label for="barcode">Barcode</label>
                            <input 
                                type="text"
                                id="barcode"
                                name="barcode"
                                v-model="form.barcode"
                            />
                            <div class="text-red-700 text-sm">
                                {{ errors.barcode}}
                            </div>
                        </div>

                        <div class="flex pt-6 space-x-4 items-center">
                            <label for="discontinued">Discontinued</label>
                                <input type="checkbox" id="discontinued" name="discontinued" true-value="Y" false-value="N" v-model="form.discontinued">
                        </div>


                        <div class="flex flex-col pt-6">
                            <button
                                type="submit"
                                class="bg-indigo-800 text-white p-2" 
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </Layout>
    </div>
</template>

<script>
import { ref, reactive } from "vue";
import Layout from '@/Layouts/Authenticated';
import { Inertia } from "@inertiajs/inertia";
export default {
    components: {
        Layout,
    },
    props: {
        stock_categories: Array,
        errors: Object,
    },
    setup(props, context) {
        const form = reactive({
            id: null,
            description: null,
            stock_category_id: null,
            uom: null,
            barcode: null,
            //discontinued: "N",
        });
        const submit = () => {
            Inertia.post(route("stock.store"), form, {
                onSuccess: () => {
                form.id = null;
                form.description = null;
                form.stock_category_id = null;
                form.uom = null;
                form.barcode = null;
                //form.discontinued = "N";
                    // this.reset();
                },
            });
        };
        
        return {
            form,
            submit,
        };
    },
};
</script>