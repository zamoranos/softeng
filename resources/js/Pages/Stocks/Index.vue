<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Stocks
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex flex-row justify-end mr-28">
              <inertia-link :href="route('stock.create')">
                <button class="mx-2 my-2 bg-green-700 w-25 transition duration-150 ease-in-out hover:bg-green-600 rounded text-white px-5 py-2 text-xs">Create</button>

              </inertia-link>
            </div>
            <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
              <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Description</th>
                <th class="px-4 py-3">Stock Category ID</th>
                <th class="px-4 py-3">UoM</th>
                <th class="px-4 py-3">Barcode</th>
                <th class="px-4 py-3">Discontinued</th>
                <th class="px-4 py-3">Time created</th>
                <th class="px-4 py-3">Time updated</th>
                <th class="px-4 py-3">Action</th>
              </tr>
              
              <tr v-for="item in stocks" :key="item.id" class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3">{{item.id}}</td>
                <td class="px-4 py-3">{{item.description}}</td>
                <td class="px-4 py-3">{{item.stock_category_id}}</td>
                <td class="px-4 py-3">{{item.uom}}</td>
                <td class="px-4 py-3">{{item.barcode}}</td>
                <td class="px-4 py-3 text-center">{{item.discontinued}}</td>
                <td class="px-4 py-3">{{item.created_at}}</td>
                <td class="px-4 py-3">{{item.updated_at}}</td>
                <td >
                        <inertia-link :href="route('stock.show',item.id)">
                          <button class="mx-1 my-2 bg-blue-700 w-20 transition duration-150 ease-in-out hover:bg-blue-600 rounded text-white px-5 py-2 text-xs">
                            View  
                          </button>
                        </inertia-link>

                        <inertia-link method="delete" :href="route('stock.destroy',item.id)">
                          <button class="mx-1 my-2 bg-red-700 w-20 transition duration-150 ease-in-out hover:bg-red-600 rounded text-white px-5 py-2 text-xs">
                            Delete
                          </button>
                        </inertia-link>
                </td>
              </tr> 
              <!-- each row -->

            </table>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";

export default {
    props: {
        stocks: Array, 
        success: String,
    }, 
  components: {
    BreezeAuthenticatedLayout,
  },
};
</script>
