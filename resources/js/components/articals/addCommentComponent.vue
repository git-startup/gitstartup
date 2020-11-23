<template>
    <div>
        <form method="POST" @submit.prevent id="commentForm">       
            <h5 class="text-right">الاسم</h5>
            <input type="text" placeholder="اكتب اسمك هنا" name="username" v-model="username" class="form-control text-right" id="username">
            <br> 
            <input type="hidden" name="image" :value="this.user.image" id="userImage">

            <h5 class="text-right">التعليق</h5>
            <textarea name="content" v-model="content" id="comment-text" rows="8" placeholder="اكتب التعليق " class="form-control text-right">
            </textarea>
            <br> 
            <input type="hidden" name="article_id" id="article_id">
            <button class="btn custom-bg w3-right" @click="comment(article.id)" type="button" id="add-comment">اضافة تعليق</button> 
            <br><br><br>
        </form>
    </div> 
</template>

<script>
    export default {
        props: {
            article: { 
                required: true
            },
            user: {
                type: Object
            }
        },
        data() {
            return {
                username:   '',
                content:   '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
            }
        }, 
        methods: {
            comment(article_id){
                axios.post("/article/" + this.article.slug,{
                    username:   this.username,
                    article_id: article_id,
                    content:    this.content,
                    csrf:       this.csrf
                }).then((response) => {
                    const btn = document.querySelector('#add-comment'); 
                    const comment_div = document.querySelector('.comment'); 
                    const userName = document.querySelector('#username'); 
                    const userImage = document.querySelector('#userImage'); 
                    const commentText = document.querySelector('#comment-text'); 
                    
                    
                    let newComment = document.createElement('div'); 
                    newComment.classList.add('comments'); 
                    newComment.innerHTML = ` <h5 class="text-primary">
                    <img src="${userImage.value}" width="50" height="50">
                    <span class="w3-margin-right">${userName.value}</span>
                    </h5> 
                    <p>${commentText.value}</p>`; 
                    comment_div.parentElement.appendChild(newComment); 
                        userName.value = ''; 
                        commentText.value = '';

                    
                });
            }
        }
    }
</script>
