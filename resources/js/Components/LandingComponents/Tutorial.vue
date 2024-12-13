<template>
    <section data-layername="tutorial" class="flex flex-col bg-white mt-5">
        <!-- Header -->
        <header data-layername="heading"
            class="flex justify-center items-center h-60 w-full text-5xl font-semibold text-white bg-orange-500 max-md:px-4 max-md:text-4xl relative z-10">
            <h1 data-layername="sectionHeading" class="text-center">Bagaimana Cara Memilihnya?</h1>
        </header>

        <!-- Main Content -->
        <main data-layername="cardsContainer"
            class="flex flex-col justify-center px-32 pb-16 w-full max-md:px-5 max-md:max-w-full -mt-10">
            <div data-layername="row" class="flex flex-wrap gap-10 items-start w-full max-md:max-w-full">

                <!-- Card 1 -->
                <article data-layername="card01"
                    class="flex flex-col items-center flex-1 shrink basis-0 min-w-[240px] relative z-20">
                    <div data-layername="gambarLogin" class="flex flex-col w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/3c7a31115d64c9d7e5181204d8eedd29a12e64be76341f1651f2c21b9a593a71?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                            alt="Login illustration" class="object-contain w-full aspect-[1.79] -mt-10" />
                    </div>
                    <div data-layername="content"
                        class="flex justify-center items-center mt-4 w-full text-xl font-bold text-stone-900 text-center">
                        <h2 data-layername="headlineSubhead">Lakukan Login</h2>
                    </div>
                </article>

                <!-- Card 2 -->
                <article data-layername="card02"
                    class="flex flex-col items-center flex-1 shrink basis-0 min-w-[240px] relative z-20">
                    <div data-layername="menu" class="flex flex-col w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/0f7728bed2ba4d9d9b7bc9673c69d2014b50196e1f16184fb3f256bedc565971?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                            alt="Menu Grade illustration" class="object-contain w-full aspect-[1.79] -mt-10" />
                    </div>
                    <div data-layername="content"
                        class="flex justify-center items-center mt-4 w-full text-xl font-bold text-stone-900 text-center">
                        <h2 data-layername="klikMenuGrade">Klik Menu Grade</h2>
                    </div>
                </article>

                <!-- Card 3 -->
                <article data-layername="card03"
                    class="flex flex-col items-center flex-1 shrink basis-0 min-w-[240px] relative z-20">
                    <div data-layername="budget" class="flex flex-col w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/ac51f69e5f50057b59bf80e58dc8535d806967eb3842ec3d20967e6a7e4d82e4?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                            alt="Budget input illustration" class="object-contain w-full aspect-[1.79] -mt-10" />
                    </div>
                    <div data-layername="content"
                        class="flex justify-center items-center mt-4 w-full text-xl font-bold text-stone-900 text-center">
                        <h2 data-layername="masukkanBudget">Masukkan Budget</h2>
                    </div>
                </article>
            </div>

            <!-- Row 2 -->
            <div data-layername="row"
                class="flex flex-wrap gap-10 items-start self-center mt-16 max-w-full w-[1192px] max-md:mt-10">

                <!-- Card 4 -->
                <article data-layername="card04" class="flex flex-col items-center flex-1 shrink basis-0 min-w-[240px]">
                    <div data-layername="pilihSupplier" class="flex flex-col w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f0a6d64945efae3108f05010cc72b65fee0d37c1c856efeb50bab2a56a89eafc?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                            alt="Supplier selection illustration" class="object-contain w-full aspect-[1.78]" />
                    </div>
                    <div data-layername="content"
                        class="flex justify-center items-center mt-4 w-full text-xl font-bold text-stone-900 text-center">
                        <h2 data-layername="headlineSubhead">Pilih Supplier</h2>
                    </div>
                </article>

                <!-- Card 5 -->
                <article data-layername="card05" class="flex flex-col items-center flex-1 shrink basis-0 min-w-[240px]">
                    <div data-layername="cekSupplier" class="flex flex-col w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/2c67e04b6187faa740dbd26dd4b8621f04101a72cb26853c4abf903ec309c1bb?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                            alt="Supplier details check illustration" class="object-contain w-full aspect-[1.78]" />
                    </div>
                    <div data-layername="content"
                        class="flex justify-center items-center mt-4 w-full text-xl font-bold text-stone-900 text-center">
                        <h2 data-layername="headlineSubhead">Cek Detail Supplier</h2>
                    </div>
                </article>

                <!-- Card 6 -->
                <article data-layername="card06" class="flex flex-col items-center flex-1 shrink basis-0 min-w-[240px]">
                    <div data-layername="hubungi" class="flex flex-col w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/7aa64113ba2f561700af50be7e8edc4d0a5b75c489a61521373bec1329023459?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                            alt="Contact supplier illustration" class="object-contain w-full aspect-[1.78]" />
                    </div>
                    <div data-layername="content"
                        class="flex justify-center items-center mt-4 w-full text-xl font-bold text-stone-900 text-center">
                        <h2 data-layername="headlineSubhead">Hubungi Supplier yang Anda Pilih</h2>
                    </div>
                </article>
            </div>
        </main>
    </section>
</template>
