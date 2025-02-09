"use client"

import {
  FacebookShareButton,
  WhatsappShareButton,
  LinkedinShareButton
} from 'react-share';

const SocialShare = ({ post }) => {

  return (
    <ul className="d-flex share-icon align-items-center style-none pb-20">
      <li>Share:</li>
      <FacebookShareButton
        url={`https://gitstartup.com/blog/${post.slug}`}
        quote={post.en_title}
        hashtag={'#gitstartup'}
      >
        <li>
          <a href="#">
            <i className="bi bi-facebook" />
          </a>
        </li>
      </FacebookShareButton>
      <WhatsappShareButton
        url={`https://gitstartup.com/blog/${post.slug}`}
        quote={post.en_title}
        hashtag={'#gitstartup'}
      >
      <li>
        <a href="#">
          <i className="bi bi-whatsapp" />
        </a>
      </li>
      </WhatsappShareButton>
      <LinkedinShareButton
        url={`https://gitstartup.com/blog/${post.slug}`}
        quote={post.en_title}
        hashtag={'#gitstartup'}
      >
        <li>
          <a href="#">
            <i className="bi bi-linkedin" />
          </a>
        </li>
      </LinkedinShareButton>
    </ul>
  );
};

export default SocialShare;
