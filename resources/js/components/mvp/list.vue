<template>
    <div class="w3-container w3-white w3-padding">
        <div class="card" style="width: 100%;">
            <ul v-if="projects" class="list-group list-group-flush">
                <li v-for="project in projects"  v-if="project.disabled =='false'" :key="project.id" class="list-group-item w3-light-grey"><a :href="`/project.${project.id}`">{{ project.project_name }}</a>
                <img :src="project.project_image" style="width: 100%; height: 150px;" class="w3-margin-top" />
                </li>
                <br>
            </ul>
        </div>
    </div>
</template>



<script>
    export default {
        props: {
            projects: {
                type: Array,
            }
        },
		data() {
			return {
                user: null,
			}
        }
    }
</script>


<style></style>
