<template>
  <div>
    <input 
      type="hidden"
      name="tags"
      :value="tagsJson"
    >
    <vue-tags-input
      class="vue-tag-width"
      v-model="tag"
      :tags="tags"
      placeholder="タグを5個まで追加できます"
      :autocomplete-items="filteredItems"
      @tags-changed="newTags => tags = newTags"
      :add-on-key="[13, 32]"
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
    initialTags: {
      type: Array,
      default: [],
    },
    autocompleteItems: {
      type: Array,
      default: [],
    }
  },
  data() {
    return {
      tag: '',
      tags: this.initialTags,
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
<style lang="css">
  .vue-tags-input .ti-tag {
    background: transparent;
    border: 1px solid rgb(114, 113, 109);
    color: #111111;
    margin-right: 4px;
    border-radius: 20px;
    font-size: 14px;
    max-width: 100% !important;
  }
  
  .vue-tags-input .ti-tag::before {
    content: "#";
    font-size: 14px;
  }
  .ti-input {
    border-radius: 5px;
  }
  .vue-tag-width {
    width: 100%;
    max-width: 100% !important;
    border-radius: 5px !important;
  }
</style>