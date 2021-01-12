<template>
  <div>
    <input 
      type="hidden"
      name="tags"
      :value="tagsJson"
    >
    <vue-tags-input
      v-model="tag"
      :tags="tags"
      placeholder="タグを5個まで追加できます"
      :autocomplete-items="filteredItems"
      @tags-changed="newTags => tags = newTags"
    >
    </vue-tags-input>
  </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
  components: {
    VueTagsInput,
  },
  props: {
    autocompleteItems: {
      type: Array,
      default: [],
    }
  },
  data() {
    return {
      tag: '',
      tags: [],
    };
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    tagsJson() {
      return JSON.stringify(this.tags)
    },
  },
};
</script>