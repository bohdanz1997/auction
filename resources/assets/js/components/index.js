import Vue from 'vue'
import Card from './Card'
import Child from './Child'
import Button from './Button'
import Checkbox from './Checkbox'
import FormInput from './Form/Input'
import FormGroup from './Form/Group'
import FormSelect from './Form/Select'
import FormTextArea from './Form/TextArea'
import FormFile from './Form/File'
import VTable from './VTable'
import { HasError, AlertError, AlertSuccess } from 'vform'

// Components that are registered globaly.
[
  Card,
  Child,
  Button,
  Checkbox,
  HasError,
  AlertError,
  AlertSuccess,
  FormInput,
  FormGroup,
  FormSelect,
  FormTextArea,
  FormFile,
  VTable,
].forEach(Component => {
  Vue.component(Component.name, Component)
})
