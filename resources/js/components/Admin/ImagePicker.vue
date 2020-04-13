<template>
    <div>
        <img :src="imageLink" class="max-w-full">
        <div class="flex justify-around mt-8">
            <div>
                <form method="POST" enctype="multipart/form-data">
                    <image-upload name="team" @loaded="onLoad"></image-upload>	
                </form>
            </div>
            <div>
                 <button
                      @click="persist"
                      type="button"
                      class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded"
                    >Сохранить</button>
                  </div>
            </div>
        </div>
        
    </div>
</template>

<script>
import ImageUpload from './ImageUpload'
export default {
    components: { ImageUpload },
    data() {
        return {
            imageLink: '',
            file: ''
        };
    },
    methods: {
			onLoad({ src, file } = {}) {
				this.imageLink = src;
				this.file = file;
			},

			persist() {
                this.$emit('image-link', 'https://hello.com')
				// let data = new FormData();
				// data.append('teamImage', this.file);
				// axios.post('/api/users/${this.user.name}/team', data)
				// 	.then(response => flash(response.data));
			}
		}
    
}
</script>