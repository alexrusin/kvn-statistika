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
    props: ['oldImageUrl'],
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
				let data = new FormData();
				data.append('image', this.file);
                data.append('oldImageLink', this.oldImageUrl);
				axios.post('/api/images', data)
					.then(response => {
                        this.$emit('image-link', response.data)
                    })
                    .catch(error => {
                        if (error.response.data.message) {
                            flash(error.response.data.message, "danger");
                        } else {
                            flash('Error processing request', "danger");
                        }
                    });
			}
		}
    
}
</script>