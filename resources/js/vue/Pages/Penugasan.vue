<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item label="Objek">
                <b-field horizontal label="Nama Obyek">
                    <b-autocomplete :data="obyekOptions" placeholder="contoh Dinas Kesehatan Kabupaten..." field="nama"
                        open-on-focus :loading="isFetching" @typing="getObyekPenugasan"
                        @select="option => form.ref_obyek = option">

                        <template v-slot="props">
                            {{ props.option.nama }}
                        </template>
                    </b-autocomplete>
                </b-field>
                <input type="hidden" v-model="form.ref_obyek.id" />
                <b-field horizontal label="Alamat">
                    <b-input v-model="form.ref_obyek.alamat" maxlength="200" type="textarea" readonly></b-input>
                </b-field>
                <b-field horizontal label="Rencana Penugasan">
                    <b-input v-model="form.nomor_tugas" placeholder="Nomor surat tugas"></b-input> / &nbsp;<b-input
                        v-model="form.irban" placeholder="IRBAN"></b-input>
                </b-field>
                <b-field horizontal label="Nama Kegiatan">
                    <b-input v-model="form.nama_kegiatan" maxlength="200" type="textarea"></b-input>
                </b-field>
                <b-field horizontal label="Tahun Anggaran">
                    <b-select v-model="form.tahun_anggaran" placeholder="Pilih Tahun">
                        <option v-for="year in years" :value="year" :key="year">{{ year }}</option>
                    </b-select>
                </b-field>
                <b-field horizontal label="Sasaran Penugasan">
                    <b-input v-model="form.sasaran_penugasan" maxlength="200" type="textarea"></b-input>
                </b-field>
                <b-field horizontal label="Tujuan Penugasan">
                    <b-input v-model="form.tujuan_penugasan" maxlength="200" type="textarea"></b-input>
                </b-field>
                <b-field horizontal label="Laporan Ditunjukan">
                    <b-input v-model="form.laporan_ditunjukan" maxlength="200" type="textarea"></b-input>
                </b-field>
                <b-field horizontal label="Jenis Pengawasan">
                    <b-select v-model="form.ref_jenis_pengawasan.id" placeholder="Pilih">
                        <option v-for="jenis_pengawasan in jenisPengawasanOptions" :value="jenis_pengawasan.id"
                            :key="jenis_pengawasan.id">{{
            jenis_pengawasan.nama }}
                        </option>
                    </b-select>
                </b-field>
            </b-tab-item>

            <b-tab-item label="Penugasan">
                <fieldset>
                    <legend>Tim Bertugas</legend>
                    <b-field horizontal label="Inspektur Pembantu Wilayah">
                        <b-select
                            v-model="form.inspektur_pembantu_wilayah_id"
                            placeholder="Pilih pegawai"
                            expanded
                        >
                            <option
                                v-for="pegawai in pegawaiOptions"
                                :value="pegawai.id"
                                :key="pegawai.id"
                            >
                                {{pegawai.nama_lengkap }}
                            </option>
                        </b-select>
                    </b-field>
                    <b-field horizontal label="Pengendali Teknis">
                        <b-select v-model="form.pengendali_teknis_id" placeholder="Pilih pegawai" expanded>
                            <option
                                v-for="pegawai in pegawaiOptions"
                                :value="pegawai.id"
                                :key="pegawai.id"
                            >
                                {{pegawai.nama_lengkap }}
                            </option>
                        </b-select>
                    </b-field>
                    <b-field horizontal label="Ketua Tim">
                        <b-select v-model="form.ketua_tim_id" placeholder="Pilih pegawai" expanded>
                            <option
                                v-for="pegawai in pegawaiOptions"
                                :value="pegawai.id"
                                :key="pegawai.id"
                            >
                                {{pegawai.nama_lengkap }}
                            </option>
                        </b-select>
                    </b-field>
                    <fieldset>
                        <legend style="font-size:14px">Anggota Tim
                            <b-button
                                class="is-pulled-right"
                                size="is-small"
                                type="is-dark"
                                icon-pack="fas"
                                icon-left="plus"
                                @click="addPegawai"
                            />
                        </legend>

                        <div class="columns" v-for="(pegawai, index) in form.pegawais" :key="pegawai.id">
                            <div class="column is-6">
                                <b-select
                                    expanded
                                    style="width: 100%;"
                                    v-model="pegawai.id"
                                    placeholder="Pilih pegawai"
                                    @change="setNip(index)"
                                >
                                    <option
                                        v-for="pegawaiOption in pegawaiOptions"
                                        :value="pegawaiOption.id"
                                        :key="pegawaiOption.id"
                                    >
                                        {{pegawaiOption.nama_lengkap }}
                                    </option>
                                </b-select>
                            </div>
                            <div class="column is-5">
                                <b-input v-model="pegawai.nip" readonly></b-input>
                            </div>
                            <div class="column is-1">
                                <b-button
                                    class="is-pulled-right"
                                    size="is-small"
                                    type="is-danger"
                                    icon-pack="fas"
                                    icon-left="times"
                                    @click="removePegawai(index)"
                                />
                            </div>
                        </div>

                    </fieldset>
                </fieldset>
                <hr/>
                <fieldset>
                    <legend>Surat Tugas</legend>

                    <section>
                        <b-field horizontal label="File">
                            <b-field class="file is-primary" :class="{'has-name': !!form.surat_tugas}">
                                <b-upload v-model="form.surat_tugas" class="file-label" rounded>
                                <span class="file-cta">
                                    <b-icon class="file-icon" pack="fas" icon="upload"></b-icon>
                                    <span class="file-label">{{ form.surat_tugas.name || "Click to upload"}}</span>
                                </span>
                                </b-upload>
                            </b-field>
                        </b-field>
                        <b-field horizontal label="Nomor">
                            <b-input v-model="form.nomor_surat_tugas"></b-input>
                            <p class="control">
                                <span class="button is-static">Nomor Kartu: KP-{{ form.nomor_surat_tugas }}</span>
                            </p>
                        </b-field>
                        <b-field horizontal label="Tanggal">
                            <b-datepicker
                                v-model="form.tanggal_surat_tugas"
                                placeholder="Pilih tanggal..."
                                icon="calendar-today"
                                :icon-right="selected ? 'close-circle' : ''"
                                icon-right-clickable
                                @icon-right-click="clearDate"
                                trap-focus
                            >
                            </b-datepicker>
                        </b-field>
                        <b-field horizontal label="Penerbit">
                            <b-input v-model="form.penerbit_surat_tugas"></b-input>
                        </b-field>
                        <b-field horizontal label="Instansi">
                            <b-input v-model="form.instansi_surat_tugas"></b-input>
                        </b-field>
                        <b-field horizontal label="Perencanaan">
                            <b-datepicker
                                placeholder="Pilih..."
                                v-model="form.tanggal_perencanaan"
                                range>
                            </b-datepicker>
                        </b-field>
                        <b-field horizontal>
                            <div>
                                Tanggal Efektif
                                <b-datepicker
                                    :min-date="form.tanggal_perencanaan[0] || '2021-01-01'"
                                    :max-date="form.tanggal_perencanaan[1] || '2024-12-31'"
                                    inline
                                    placeholder="Click to select..."
                                    v-model="form.tanggal_perencanaan_efektif"
                                    multiple>
                                </b-datepicker>
                            </div>
                        </b-field>
                        <b-field horizontal label="Pelaksanaan">
                            <b-datepicker
                                placeholder="Pilih..."
                                v-model="form.tanggal_pelaksanaan"
                                range>
                            </b-datepicker>
                        </b-field>
                        <b-field horizontal>
                            <div>
                                Tanggal Efektif
                                <b-datepicker
                                    :min-date="form.tanggal_pelaksanaan[0] || '2021-01-01'"
                                    :max-date="form.tanggal_pelaksanaan[1] || '2024-12-31'"
                                    inline
                                    placeholder="Click to select..."
                                    v-model="form.tanggal_pelaksanaan_efektif"
                                    multiple>
                                </b-datepicker>
                            </div>
                        </b-field>
                        <b-field horizontal label="Pelaporan">
                            <b-datepicker
                                placeholder="Pilih..."
                                v-model="form.tanggal_pelaporan"
                                range>
                            </b-datepicker>
                        </b-field>
                        <b-field horizontal>
                            <div>
                                Tanggal Efektif
                                <b-datepicker
                                    :min-date="form.tanggal_pelaporan[0] || '2021-01-01'"
                                    :max-date="form.tanggal_pelaporan[1] || '2024-12-31'"
                                    inline
                                    placeholder="Click to select..."
                                    v-model="form.tanggal_pelaporan_efektif"
                                    multiple>
                                </b-datepicker>
                            </div>
                        </b-field>
                        <b-field horizontal label="Lama Penugasa">
                            <b-input v-model="form.lama_penugasan"></b-input>
                        </b-field>
                    </section>
                </fieldset>
                <hr/>
                <div class="buttons is-pulled-right">
                    <b-button type="is-primary" outlined>Simpan Draf</b-button>
                    <b-button type="is-success" outlined>Proses</b-button>
                </div>
            </b-tab-item>
        </b-tabs>
    </section>
</template>

<script>
import debounce from 'lodash/debounce'
import { defineComponent, onMounted, reactive, ref } from 'vue'
import api from '../../api'

export default defineComponent({
    name: 'PenugasanPage',
    components: {
    },
    computed: {
        years() {
            const currentYear = new Date().getFullYear() - 2
            return Array.from({ length: 10 }, (v, k) => currentYear + k)
        }
    },
    setup(props, context) {
        const activeTab = ref(0)
        const showBooks = ref(false)
        const isFetching = ref(false)
        const obyekOptions = ref([])
        const jenisPengawasanOptions = ref([])
        const pegawaiOptions = ref([])

        const form = reactive({
            ref_obyek: {},
            penugasan: null,
            nomor_tugas: null,
            irban: null,
            tahun_anggaran: null,
            sasaran_penugasan: null,
            tujuan_penugasan: null,
            laporan_ditunjukan: null,
            ref_jenis_pengawasan: {},
            inspektur_pembantu_wilayah_id: null,
            pengendali_teknis_id: null,
            ketua_tim_id: null,
            pegawais: [],
            surat_tugas: {},
            nomor_surat_tugas: null,
            tanggal_surat_tugas: null,
            penerbit_surat_tugas: null,
            instansi_surat_tugas: null,
            tanggal_perencanaan: [new Date(), new Date()],
            tanggal_perencanaan_efektif: [],
            tanggal_pelaksanaan: [new Date(), new Date()],
            tanggal_pelaksanaan_efektif: [],
            tanggal_pelaporan: [new Date(), new Date()],
            tanggal_pelaporan_efektif: [],
            lama_penugasan: null,
        });

        const getObyekPenugasan = debounce(function (name) {
            isFetching.value = true
            api.get(`/obyek/list?pageSize=all&search=${name}`)
                .then(({ data }) => {
                    obyekOptions.value = []
                    data.data.forEach((item) => obyekOptions.value.push(item))
                })
                .catch((error) => {
                    obyekOptions.value = []
                    throw error
                })
                .finally(() => {
                    isFetching.value = false
                })
        }, 500)

        const getJenisPenugasan = () => {
            api.get(`/jenis-pengawasan/list?pageSize=all`)
                .then(({ data }) => {
                    jenisPengawasanOptions.value = []
                    data.data.forEach((item) => jenisPengawasanOptions.value.push(item))
                })
                .catch((error) => {
                    jenisPengawasanOptions.value = []
                    throw error
                })
                .finally(() => {
                    isFetching.value = false
                })
        }

        const getPegawai = () => {
            api.get(`/pegawai/list?pageSize=all&search=${name}`)
                .then(({ data }) => {
                    pegawaiOptions.value = []
                    data.data.forEach((item) => pegawaiOptions.value.push(item))
                })
                .catch((error) => {
                    pegawaiOptions.value = []
                    throw error
                })
                .finally(() => {
                    isFetching.value = false
                })
        }

        const addPegawai = () => {
            form.pegawais.push({
                id: null,
                nip: null
            })
        }

        const removePegawai = (index) => {
            form.pegawais.splice(index, 1);
            console.log(form.pegawais)
            // Reindex the remaining employees
            // form.pegawais.forEach((pegawai, i) => {
            //     pegawai.id = i + 1;
            // });
        }

        const setNip = (index) => {
            const pegawai = form.pegawais[index]
            const selectedPegawai = pegawaiOptions.value.find((item) => item.id === pegawai.id)
            pegawai.nip = selectedPegawai.nip
            pegawai.id = selectedPegawai.id
        }

        onMounted(async () => {
            getJenisPenugasan();
            getPegawai();
        })

        return {
            activeTab,
            showBooks,
            isFetching,
            form,

            obyekOptions,
            pegawaiOptions,
            jenisPengawasanOptions,

            getObyekPenugasan,
            getJenisPenugasan,
            getPegawai,
            addPegawai,
            removePegawai,
            setNip
        }
    }
})
</script>
