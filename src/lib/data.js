 

export const getPosts = async () => {
  try {
    const res = await fetch("https://gitstartup.net/api/blogs", {
      next: { revalidate: 3600 }
    })
    return res.json()
  } catch (err) {
    console.log(err);
    throw new Error("Oops, Failed to fetch posts!");
  }
};

export const getPostDetails = async (slug) => {
  try {
    const res = await fetch(`https://gitstartup.net/api/blogs/${slug}`)
    return res.json()
  } catch (err) {
    console.log(err);
    throw new Error("Oops, Failed to fetch post!");
  }
};

 
export const getPartners = async () => {
  try {
    const res = await fetch("https://gitstartup.net/api/partners", {
      next: { revalidate: 3600 },
    })
    return res.json()
  } catch (err) {
    console.log(err);
    throw new Error("Oops, Failed to fetch partners!");   
  }
}

export const getExperts = async () => {
  try {
    const res = await fetch("https://gitstartup.net/api/experts", {
      next: { revalidate: 3600 },
    })
    return res.json()
  } catch (err) {
    console.log(err);
    throw new Error("Oops, Failed to fetch experts!");   
  }
}


export const getExpertDetails = async (id) => {
  try {
    const res = await fetch(`https://gitstartup.net/api/experts/${id}`, {
      next: { revalidate: 3600 },
    })
    return res.json()
  } catch (err) {
    console.log(err);
    throw new Error("Oops, Failed to fetch expert details!");   
  }
}


export const getProjects = async () => {
  try {
    const res = await fetch("https://gitstartup.net/api/projects", {
      next: { revalidate: 3600 },
    })
    return res.json()
  } catch (err) {
    console.log(err);
    throw new Error("Oops, Failed to fetch projects!");   
  }
}


export const getProjectDetails = async (slug) => {
  try {
    const res = await fetch(`https://gitstartup.net/api/projects/${slug}`, {
      next: { revalidate: 3600 },
    })
    return res.json()
  } catch (err) {
    console.log(err);
    throw new Error("Oops, Failed to fetch project details!");   
  }
};

