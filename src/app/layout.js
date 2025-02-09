import { Inter } from 'next/font/google'
import ClientScript from '@/components/common/ClientScript'
import ScrollTop from '@/components/common/ScrollTop'
import './globals.scss'

const inter = Inter({ subsets: ['latin'] })

export const metadata = {
  title: 'Git Startup',
  description: 'technical support for your business idea',
}


export default function RootLayout({ children }) {
  return (
    <html lang="en">
      <link rel="icon" href="/favicon.png" sizes="any" />
      <body className={inter.className}>
        <div className="main-page-wrapper">
          {children}
          <ScrollTop />
          <ClientScript />
        </div>
      </body>
    </html>
  )
}