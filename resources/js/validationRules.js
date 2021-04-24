export const validationRules = {
  desktop: {
    prevCycleStart: {
      required: true,
      date: true,
      dateIsNotFuture: true
    }
  },
  mobile: {
    day: {
      required: true,
      min: 1,
      max: 31,
    },
    month: {
      required: true,
      min: 1,
      max: 12,
    },
    year: {
      required: true,
      min: parseInt(new Date().getFullYear(), 10) - 1,
      max: parseInt(new Date().getFullYear(), 10)
    },
    prevCycleStart: {
      //required: true,
      date: true,
      dateIsValid: true,
      dateIsNotFuture: true

    }
  }
}
