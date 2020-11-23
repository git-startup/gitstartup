


const comment_div = document.getElementById('#commentfor-'+status_id); 
					const userName = document.getElementById('#comment_userName'); 
					const userImage = document.getElementById('#comment_userImage'); 
					const commentText = document.getElementById('#comment'); 

				    let newComment = document.createElement('div'); 
				    newComment.classList.add('comment'); 
				    newComment.innerHTML = ` <h5 class="text-primary"><img src="${userImage.value}">${userName.value}</h5> 
				    <p>${commentText.value}</p>`; 
				    comment_div.parentElement.appendChild(newComment); 
				        userName.value = ''; 
				        commentText.value = '';