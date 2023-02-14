<template>
  <div class="w-screen h-screen flex justify-center items-center">
    <div class="w-300px">
      <div class="form-content">
        <input type="text" class="task-text" v-model="input_task">
        <button v-on:click="addTask()" type="button" class="add-btn">追加</button>
      </div>
      <div v-if="tasks.length">
        <ul class="task-lists">
          <li  v-for="(task,key) in tasks" :key="key">
            <div>
              <button v-on:click="deleteTask(key)" type="button" class="delete-btn">X</button>
            </div>
            <div class="task-label">{{ task }}</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data()  {
    return {
      input_task : '',
      tasks: [],
    }
  },
  methods: {
    addTask() {
      this.tasks.push(this.input_task);
      this.input_task = '';
    },
    deleteTask(key) {
      this.tasks.splice(key, 1);
    }
  }
}
</script>