<template>
    <tr>
        <td class="p-3 px-5">{{ item.name }}</td>
        <td class="p-3 px-5 truncate">{{ item.city }}</td>
        <td class="p-3 px-5">{{ item.rating}}</td>
        <td class="p-3 px-5 flex justify-end">
        <button
            type="button"
            @click="deleteTeam(item.id)"
            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
        >Delete</button>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['item'],
    methods: {
       deleteTeam(id) {
          axios.delete(`/admin/enter-data/teams/${id}`)
          .then(({data}) => {
              if (data.alertType == 'success') {
                  this.$emit('teamDeleted', id);
                  flash(data.message);
              }
          })
          .catch(error => {
              if (error.response.data.message) {
                  flash(error.response.data.message, error.response.data.alertType);
              } else {
                  flash('Невозможно удалить команду', 'danger');
              }
          })
      } 
    }

}
</script>