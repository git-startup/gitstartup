import Link from "next/link";
import Image from "next/image";
import moment from 'moment';
import { getPosts } from "@/lib/data"


const RecentPost = async () => { 

  const posts = await getPosts() 

  return (
    <>
      {posts.slice(0, 3).map((post) => (
        <div
          className="news-block d-flex align-items-center pt-20 pb-20 border-top border-bottom"
          key={post.id}
        >
          <div>
            <Image
              width={80}
              height={90}
              src={`https://gitstartup.net/upload/blogs/${post.image}`}
              alt={post.en_title}
              className="lazy-img"
            />
          </div>
          <div className="post ps-4">
            <h4 className="mb-5">
              <Link href={`/blog/${post.slug}`} className="title tran3s">
                {post.en_title}
              </Link>
            </h4>
            <div className="date"> { moment(post.created_at).format('MMMM Do YYYY') } </div> 
          </div>
        </div>
      ))}
    </>
  );
};

export default RecentPost;
