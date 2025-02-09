"use server";


export const sendMessage = async (prevState,formData) => {

  const { name, company_name, email, phone, plan, message } = Object.fromEntries(formData);
 
  try {
    const res = await fetch('https://gitstartup.net/api/messages',{
      method: 'POST',
      body: JSON.stringify(
        { name, company_name, email, phone, plan, message } 
      ),
      headers: {
        'content-type': 'application/json'
      }
    })

    console.log(res)

    return { success: true }

  } catch (err) {
    console.log(err);
    return { error: "Something went wrong!" };
  } 
};
