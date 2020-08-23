module.exports = {
    theme: {
      extend: {
        colors: {
            'bg-blue-dark': '#2779bd'
        },
        spacing: {
          '72': '18rem',
          '2/3': '66.666667%',
          '5/6': '83.333333%'
        }
      },
      animation: {
        pulse: "pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite",
      },

      keyframes: {
        pulse: {
          "0%, 100%": {
            opacity: 0,
          },
          "50%": {
            opacity: 1,
          },
        },
      },
    },
    variants: {
      backgroundColor: ['responsive', 'hover', 'focus', 'active']
    },
    plugins: []
  }