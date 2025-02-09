import Link from "next/link";
import moment from 'moment';


const Blog = async ({ posts, numbOfPosts = 0 }) => {

  if(numbOfPosts > 0) posts = posts.slice(0, numbOfPosts)

  return (
    <>
      {posts.map((post) => (
        <div
          className="col-md-6 d-flex"
          key={post.id}
          data-aos="fade-up"
          data-aos-delay={post.id * 100}
        >
          <article
            className="blog-meta-five d-flex flex-column position-relative tran3s mb-60 lg-mb-50 wow fadeInUp" 
            id={`post-${post.id}`}
          >
            <div>
              <Link
                href={`/blog/${post.slug}`}
                className="tag text-uppercase fw-500 tran3s"
              >
                {post.category.en_name}
              </Link>
            </div>
            <div className="post-data mt-30 mb-100 lg-mb-50">
              <Link href={`/blog/${post.slug}`}>
                <h4 className="tran3s blog-title">{post.en_title}</h4>
              </Link>
            </div>
            <div className="blog-footer d-flex align-items-center justify-content-between mt-auto">
              <div className="blog-date fw-500 tx-git-color">
                <a href="#" className="fw-normal tran3s">
                Created on - { moment(post.created_at).format('MMMM Do YYYY') }  
                </a>
              </div>
              <Link href={`/blog/${post.slug}`} className="read-more tran3s">
                <i className="bi bi-arrow-up-right" />
              </Link>
              
            </div>
            {/* /.blog-footer */}
          </article>
          {/* /.blog-meta-five */}
        </div>
        /* End .col-md-6 */
      ))}
    </>
  );
};

export default Blog
