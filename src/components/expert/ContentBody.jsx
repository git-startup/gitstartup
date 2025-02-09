"use client"

import parse from 'html-react-parser'
import { useState, useEffect } from 'react'


const ContentBody = ({ expert }) => {

// to solve the hydration issue
const [isClient, setIsClient] = useState(false)

useEffect(() => {
  setIsClient(true)
}, [])


  return ( 
    <p>
        { isClient ? parse(expert.bio)  : ''}
    </p>
  )
}

export default ContentBody
