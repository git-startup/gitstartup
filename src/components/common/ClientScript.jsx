"use client"
 
import { useEffect } from 'react'
import { hotjar } from 'react-hotjar'
import ReactGA from 'react-ga4'

function ClientScript() {

  // to initialize hotjar services
  const siteId = 3858905
  const hotjarVersion = 6

  useEffect(() => {
    // initialize bootstrap 
    require('bootstrap/dist/js/bootstrap.min.js')
    // initialize hotjar services
    hotjar.initialize(siteId, hotjarVersion)
    // initialize google services
    ReactGA.initialize('G-ZXRPWBKQLQ')
  }, []);

  return null;
}

export default ClientScript