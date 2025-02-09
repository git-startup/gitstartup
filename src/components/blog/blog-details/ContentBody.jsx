"use client"

import parse from 'html-react-parser'
import { useState, useEffect } from 'react'


const ContentBody = ({ post }) => {

// to solve the hydration issue
const [isClient, setIsClient] = useState(false)

useEffect(() => {
  setIsClient(true)
}, [])


  return (
    <p>
        { isClient ? parse(post.en_content) : ''}
    </p>
  )
}

export default ContentBody;
