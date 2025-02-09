import Link from "next/link";
import Header from "@/components/common/Header";
import RecentPost from "@/components/blog/RecentPost";
import BannerPost from "@/components/blog/BannerPost";
import Tag from "@/components/blog/blog-details/Tag";
import SocialShare from "@/components/blog/blog-details/SocialShare";
import ContentBody from "@/components/blog/blog-details/ContentBody";
import Social from "@/components/common/Social";
import Image from "next/image";
import moment from 'moment';
import { getPostDetails } from "@/lib/data"

export const generateMetadata = async ({ params }) => {
  const { slug } = params;

  const post = await getPostDetails(slug);

  return {
    title: post.en_title,
    description: post.page_description,
  };
};

const PostDetails = async ({ params }) => {

  const { slug } = params

  const post = await getPostDetails(slug)

  return (
    <>

      {/* <!-- 
      =============================================
      Theme Default Menu
      ============================================== 	
      --> */}
      <Header />

      {/* 
			=============================================
			Feature Section Fifty One
			============================================== 
			*/}
      <div className="fancy-feature-fiftyOne position-relative mt-250 lg-mt-200">
        <div className="container">
          <div className="row">
            <div className="col-xxl-8 col-lg-9 wow fadeInLeft">
              <p className="blog-pubish-date">
                <Link href="/" >Git Startup </Link> -
                { moment(post.created_at).format('MMMM Do YYYY') } 
              </p>
              <h2 className="blog-heading-one tx-git-color">{post.en_title}</h2>
            </div>
          </div>
        </div>
        {/* /.container */}

        <Image
          src="/images/shape/shape-172.svg"
          alt="shape"
          className="lazy-img shapes shape-two"
          width={164}
          height={122}
        />
      </div>

      {/*
			=====================================================
				Blog Section Five
			=====================================================
			*/}
      <div className="blog-details-one mt-80 lg-mt-60">
        <div className="container">
          <div className="border-bottom pb-130 lg-pb-60">
            <div className="row gx-xl-5">
              <div className="col-lg-8">
                <div className="blog-meta-wrapper pe-xxl-5">
                  <article className="blog-details-content">
                    {post.image && (
                      <Image
                        width={816}
                        height={597}
                        layout="responsive"
                        src={`https://gitstartup.net/upload/blogs/${post.image}`}
                        alt={post.en_title}
                        className="lazy-img image-meta w-100"
                      />
                    )}
                   <ContentBody post={post} />

                    <div className="bottom-widget d-sm-flex align-items-center justify-content-between">
                      <Tag />
                      <SocialShare post={post}/>
                    </div>
                    {/* /.bottom-widget */}
                  </article>
                  {/* /.blog-details-content */}

                </div>
              </div>
              {/* End .col-lg-8 */}

              <div className="col-lg-4 col-md-8">
                <div className="blog-sidebar md-mt-70">
                  {/* /.blog-sidebar-category */}
                  <div className="sidebar-recent-news mb-60 md-mb-50">
                    <h4 className="sidebar-title">Recent Posts</h4>
                    <RecentPost posts={ post.posts } />
                  </div>
                  {/* /.sidebar-recent-news */}

                  <BannerPost />
                  {/* /.sidebar-banner-add */}
                </div>
                {/* /.blog-sidebar */}
              </div>
            </div>
          </div>
        </div>
      </div>

      {/*
			=====================================================
				Footer
			=====================================================
			*/}
      <div className="footer-style-four position-relative">
        <div className="container">
          <div className="row align-items-center">
            <div className="col-lg-4 mb-30 order-lg-0">
              <div className="logo d-flex justify-content-center justify-content-lg-start">
                <Link href="/">
                  <Image src="/images/logo/gitstartup_logo.png" alt="Git Startup" width={77} height={77} />
                </Link>
              </div>
            </div>
            {/* End .col-lg-4 */}

            <div className="col-lg-4 mb-30 d-flex justify-content-center justify-content-lg-end order-lg-3">
              <a
                href="mailto:info@gitstartup.com"
                className="mail d-flex align-items-center"
              >
                <span className="icon d-flex align-items-center justify-content-center rounded-circle">
                  <i className="far fa-envelope" />
                </span>{" "}
                <span>info@gitstartup.com</span>
              </a>
            </div>
            {/* End .col-lg-4 */}

            <div className="col-lg-4 mb-30 order-lg-2">
              <Social />
            </div>
            {/* End .col-lg-4 */}
          </div>
        </div>
      </div>
      {/* /.footer-style-four */}
    </>
  );
};

export default PostDetails;
