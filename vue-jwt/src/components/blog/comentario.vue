<template>
    <div class="comment-preview">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Comment here" aria-label="Comment here" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Comment</span>
            </div>
        </div>
        <div class="comment-content" v-for="item in 10" :key="item">
            <div class="row">
                <div class="col-md-1">
                    <img src="https://picsum.photos/id/830/200/300" class="rounded-circle images-profile">
                </div>
                <div class="col-md-11">
                    <div class="row info-user">
                        <div class="col-md-12 info-data-user">
                            <strong>Kevin Mendez</strong>
                        </div>
                        <div class="col-md-12 info-date">
                            <span>
                                12 / 12 / 2019
                            </span>
                        </div>
                    </div>
                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, id sunt, nesciunt impedit animi pariatur illo cum provident expedita porro deleniti ab dolor quod dolore suscipit consequuntur officia tempore! Enim!
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
@Component({
  name: 'Blogs',
  data() {
    return {
    }
  },
  components: {
  },
})
export default class blog extends Vue {}
</script>

<style lang="scss" scoped>
    p {
        margin: 10px 0px;
    }
    .comment-preview {
        .comment-content {
            padding-left: 30px;
            padding-top: 10px;
            .images-profile {
                height: 50px;
                width: 50px;
            }
            .info-user {
                .info-data-user {
                    color: black;
                }
                .info-date {
                    font-size: 14px;
                    color: #769292;
                }
            }
        }
    }
</style>
