/** @type {import('tailwindcss').Config} */
module.exports = {
  //content: ["./index.php", "./restaurant.php", "_sign_Up_Page.php", "./search_page.html", "./randomized.html", "./about_us.html", "./survey_page.html", "./restaurant_new.html"],
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      width: {
        '120': '27rem',
       }
    },
  },
  plugins: [
    
  ]
}
